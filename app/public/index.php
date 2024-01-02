<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

$app = AppFactory::create();

// Parse json, form data and xml
$app->addBodyParsingMiddleware();

$container->set('pdo', function () {
    $pdo = new PDO('mysql:dbname=clicdroit; host=localhost', 'clicdroit', 'clicdroit');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
});


//! ==== APP roads ====
/**
 * Home page
 * 
 * @return VIEW
 */
$app->get('/', function (Request $request, Response $response, $args) {
    $renderer = new PhpRenderer('../templates/');

    // $req = $this->get('pdo')->prepare("
    //     SELECT service_worksite.id, worksite.name as worksite, service.name as service,
    //     MAX(case when month = 'Janvier' then value end) as Jan,
    //     MAX(case when month = 'Février' then value end) as Fév,
    //     MAX(case when month = 'Mars' then value end) as Mars,
    //     MAX(case when month = 'Avril' then value end) as Avril,
    //     MAX(case when month = 'Mai' then value end) as Mai,
    //     MAX(case when month = 'Juin' then value end) as Juin,
    //     MAX(case when month = 'Juillet' then value end) as Juillet,
    //     MAX(case when month = 'Août' then value end) as Août,
    //     MAX(case when month = 'Septembre' then value end) as Sept,
    //     MAX(case when month = 'Octobre' then value end) as Oct,
    //     MAX(case when month = 'Novembre' then value end) as Nov,
    //     MAX(case when month = 'Décembre' then value end) as Déc,
    //     ROUND(SUM(value), 2) as Total
    //     FROM service_worksite
    //     INNER JOIN service ON service_worksite.service_id = service.id
    //     INNER JOIN worksite ON service_worksite.worksite_id = worksite.id
    //     GROUP BY worksite, service
    // ");

    $req = $this->get('pdo')->prepare("
        SELECT
        service_worksite.id,
        worksite.name as worksite,
        service.name as service,
        service_worksite.january,
        service_worksite.february,
        service_worksite.march,
        service_worksite.april,
        service_worksite.may,
        service_worksite.june,
        service_worksite.july,
        service_worksite.august,
        service_worksite.september,
        service_worksite.october,
        service_worksite.november,
        service_worksite.december,
        ROUND((service_worksite.january + service_worksite.february + service_worksite.march + service_worksite.april + service_worksite.may + service_worksite.june + service_worksite.july + service_worksite.august + service_worksite.september + service_worksite.october + service_worksite.november + service_worksite.december), 2) as total
        FROM service_worksite
        INNER JOIN service ON service_worksite.service_id = service.id
        INNER JOIN worksite ON service_worksite.worksite_id = worksite.id
    ");
    $req->execute();
    $allServiceWorksite = $req->fetchAll();

    $req = $this->get('pdo')->prepare("
        SELECT id, name
        FROM service
    ");
    $req->execute();
    $allService = $req->fetchAll();

    $req = $this->get('pdo')->prepare("
        SELECT id, name
        FROM worksite
    ");
    $req->execute();
    $allWorksite = $req->fetchAll();

    return $renderer->render($response, "home.tpl.php", [
        'allServiceWorksite' => $allServiceWorksite,
        'allService' => $allService,
        'allWorksite' => $allWorksite,
    ]);
});

//! ==== API roads ====
/**
 * Add service
 * 
 * @return JSON
 */
$app->post('/api/service/add', function (Request $request, Response $response, $args) {
    $data = $request->getParsedBody();

    $req = $this->get('pdo')->prepare("
        INSERT INTO `service_worksite` (`worksite_id`, `service_id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`)
        VALUES (:worksite_id, :service_id, :january, :february, :march, :april, :may, :june, :july, :august, :september, :october, :november, :december);
    ");

    $isInsert = $req->execute([
        ':worksite_id' => $data['worksite'],
        ':service_id' => $data['service'],
        ':january' => $data['january'],
        ':february' => $data['february'],
        ':march' => $data['march'],
        ':april' => $data['april'],
        ':may' => $data['may'],
        ':june' => $data['june'],
        ':july' => $data['july'],
        ':august' => $data['august'],
        ':september' => $data['september'],
        ':october' => $data['october'],
        ':november' => $data['november'],
        ':december' => $data['december'],
    ]);

    if ($isInsert) {

        $req = $this->get('pdo')->prepare("
            SELECT
            service_worksite.id,
            worksite.name as worksite,
            service.name as service,
            service_worksite.january,
            service_worksite.february,
            service_worksite.march,
            service_worksite.april,
            service_worksite.may,
            service_worksite.june,
            service_worksite.july,
            service_worksite.august,
            service_worksite.september,
            service_worksite.october,
            service_worksite.november,
            service_worksite.december,
            ROUND((service_worksite.january + service_worksite.february + service_worksite.march + service_worksite.april + service_worksite.may + service_worksite.june + service_worksite.july + service_worksite.august + service_worksite.september + service_worksite.october + service_worksite.november + service_worksite.december), 2) as total
            FROM service_worksite
            INNER JOIN service ON service_worksite.service_id = service.id
            INNER JOIN worksite ON service_worksite.worksite_id = worksite.id
            WHERE service_worksite.id = :id
        ");
        $req->execute([':id' => $this->get('pdo')->lastInsertId()]);

        $result = $req->fetch(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);

    } else {

        $response->getBody()->write(json_encode(["code" => 400, "message" => "error JSON"]));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(404);

    }
});

/**
 * Delete service
 * 
 * @return STATUS_CODE
 */
$app->delete('/api/service/delete/{id}', function (Request $request, Response $response, $args) {

    $req = $this->get('pdo')->prepare("
        DELETE FROM `service_worksite`
        WHERE id = :id
    ");
    $req->execute([':id' => $args['id']]);

    return $response->withHeader('Content-Type', 'application/json')->withStatus(204);
});

// Configuration return error into app
$app->addErrorMiddleware(true, true, true);

$app->run();
