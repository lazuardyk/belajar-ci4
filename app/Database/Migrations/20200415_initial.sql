CREATE TABLE ms_company (
    company_id int AUTO_INCREMENT,
    company_name varchar(50),
    company_phone varchar(20),
    company_address text,
    PRIMARY KEY (company_id)
);
CREATE TABLE ms_employee (
    employee_id int AUTO_INCREMENT,
    company_id int,
    employee_name varchar(50),
    employee_gender int,
    employee_birthday date,
    employee_picture varchar(100),
    employee_phone varchar(20),
    PRIMARY KEY (employee_id),
    FOREIGN KEY (company_id) REFERENCES ms_company(company_id)
);