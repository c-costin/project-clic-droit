<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1>Liste des prestations</h1>
        </div>
    </div>
    <div class="col-xs-2">
        Filtre Chantier :
    </div>
    <div class="col-xs-4">
        <select class="form-control">
            <option>Tous</option>
            <option>AM PRODUCTION</option>
            <option>ADOMOS</option>
        </select>
    </div>
    <div class="col-xs-2">
        Filtre Prestation :
    </div>
    <div class="col-xs-4">
        <select class="form-control">
            <option>Toutes</option>
            <option>Vitrerie</option>
            <option>Remise en état mensuelle</option>
        </select>
    </div>
    <table class="table table-striped table-responsive table-long">
        <thead>
            <tr>
                <th style="width:30px">
                    <a href="#" class="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-2x"></i></a>
                </th>
                <th>Chantier</th>
                <th>Prestation</th>
                <th>Janv.</th>
                <th>Fév.</th>
                <th>Mars</th>
                <th>Avril</th>
                <th>Mai</th>
                <th>Juin</th>
                <th>Juil.</th>
                <th>Août</th>
                <th>Sept</th>
                <th>Oct</th>
                <th>Nov.</th>
                <th>Déc.</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr style="font-style:normal">
                <td></td>
                <td>AM PRODUCTION (AMP0301)</td>
                <td>Vitrerie</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>21.67</td>
                <td>260,04</td>
                <td>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <tr style="font-style:normal">
                <td></td>
                <td>AM PRODUCTION (AMP0301)</td>
                <td>Remise en état mensuelle</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>36,00</td>
                <td>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <tr style="font-style:normal">
                <td></td>
                <td>ADOMOS (ADM0101)</td>
                <td>Vitrerie</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>36,00</td>
                <td>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <tr style="font-style:normal">
                <td></td>
                <td>ADOMOS (ADM0101)</td>
                <td>Remise en état mensuelle</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>36,00</td>
                <td>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>TOTAL Heures</b></td>
                <td></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>30.67</b></td>
                <td><b>368.04</b></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<!--main-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Gestion des prestations</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="formulaire-custom" id="form-heures">
                            <div class="inline-form">
                                <div class="" id="filtreHeure" style="margin: 10px 0px; padding-right: 0px;">
                                    <div class="form-group">
                                        <label for="" class="col-sm-1">Chantier</label>
                                        <div class="col-sm-4" id="select_chantier_container">
                                            <select class="form-control input-sm" name="heure_chantier" id="heure_chantier" type="text">
                                                <option>AM PRODUCTION</option>
                                                <option>ADOMOS</option>
                                            </select>
                                        </div>
                                        <label for="" class="col-sm-1">Prestation</label>
                                        <div class="col-sm-4" id="select_chantier_container">
                                            <select class="form-control input-sm" name="heure_chantier" id="heure_chantier" type="text">
                                                <option>Vitrerie</option>
                                                <option>Remise en état mensuelle</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">

                                        <hr style="margin:15px 0">
                                        <div class="form-group" id="form-heures-classiques">
                                            <div class="col-xs-2">
                                                <label>Janvier</label>
                                                <input class="form-control input-sm" id="heure_mois_1" name="heure_mois_1" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Février</label>
                                                <input class="form-control input-sm" id="heure_mois_2" name="heure_mois_2" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Mars</label>
                                                <input class="form-control input-sm" id="heure_mois_3" name="heure_mois_3" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Avril</label>
                                                <input class="form-control input-sm" id="heure_mois_4" name="heure_mois_4" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Mai</label>
                                                <input class="form-control input-sm" id="heure_mois_5" name="heure_mois_5" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Juin</label>
                                                <input class="form-control input-sm" id="heure_mois_6" name="heure_mois_6" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Juillet</label>
                                                <input class="form-control input-sm" id="heure_mois_7" name="heure_mois_7" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Août</label>
                                                <input class="form-control input-sm" id="heure_mois_8" name="heure_mois_8" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Septembre</label>
                                                <input class="form-control input-sm" id="heure_mois_9" name="heure_mois_9" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Octobre</label>
                                                <input class="form-control input-sm" id="heure_mois_10" name="heure_mois_10" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Novembre</label>
                                                <input class="form-control input-sm" id="heure_mois_11" name="heure_mois_11" value="0" type="text">
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Décembre</label>
                                                <input class="form-control input-sm" id="heure_mois_12" name="heure_mois_12" value="0" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </div>
</div>