CREATE TABLE WORKSITE (
  PRIMARY KEY (code_WORKSITE),
  code_WORKSITE VARCHAR(42) NOT NULL,
  name          VARCHAR(42)
);

CREATE TABLE POSSESS (
  PRIMARY KEY (code_WORKSITE, code_SERVICE),
  code_WORKSITE VARCHAR(42) NOT NULL,
  code_SERVICE  VARCHAR(42) NOT NULL,
  value         VARCHAR(42),
  month         VARCHAR(42)
);

CREATE TABLE SERVICE (
  PRIMARY KEY (code_SERVICE),
  code_SERVICE VARCHAR(42) NOT NULL,
  name         VARCHAR(42)
);

ALTER TABLE POSSESS ADD FOREIGN KEY (code_WORKSITE) REFERENCES WORKSITE (code_WORKSITE);
ALTER TABLE POSSESS ADD FOREIGN KEY (code_SERVICE) REFERENCES SERVICE (code_SERVICE);
