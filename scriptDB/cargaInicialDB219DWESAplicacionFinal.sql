/**
 * Author:  Sonia Antón Llanes
 * Created: 26 nov. 2021
 */


    /* Pongo en uso la base de datos creada en script creaDAW2SALDBDepartamentos */
        use DB219DWESAplicacionFinal;  


    /* Inserto las tuplas a la tabla Departamentos*/
        INSERT INTO T02_Departamento VALUES
            ('RHH', 'Departamento de recursos humanos','2021-10-05',3,null),
            ('CNT', 'Departamento de contratacion','2021-10-05',3,'2021-12-25'),
            ('ADM', 'Departamento de administracion','2021-10-05',6,null),
            ('CON', 'Departamento de contabilidad','2021-10-05',3,null),
            ('CMC', 'Departamento comercial','2021-10-21',3,null),
            ('VEN', 'Departamento de ventas','2021-11-11',2,'2021-10-21'),
            ('COM', 'Departamento de compras','2021-11-11',2,'2022-01-13'),
            ('MKT', 'Departamento de marketing','2021-11-08',5,null),
            ('INF', 'Departamento de informatica','2021-10-18',1,null),
            ('MTO', 'Departamento de mantenimiento','2021-11-01',5,null),
            ('LOG', 'Departamento de logistica','2021-10-11',2,null),
            ('CTR', 'Departamento de control de gestión','2021-11-11',2,null);

    /* Inserto las tuplas a la tabla Usuarios*/
        INSERT INTO T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario) VALUES
            ('outmane',SHA2('outmanepaso',256),'Outmane'),
            ('rodrigo',SHA2('rodrigopaso',256),'Rodrigo'),
            ('isabel',SHA2('isabelpaso',256),'Isabel'),
            ('david',SHA2('davidpaso',256),'David'),
            ('albertoF',SHA2('albertoFpaso',256),'AlbertoF'),
            ('aroa',SHA2('aroapaso',256),'Aroa'),
            ('johanna',SHA2('johannapaso',256),'Johanna'),
            ('oscar',SHA2('oscarpaso',256),'Oscar'),
            ('sonia',SHA2('soniapaso',256),'Sonia'),
            ('heraclio',SHA2('heracliopaso',256),'Heraclio'),
            ('amor',SHA2('amorpaso',256),'Amor'),
            ('antonio',SHA2('antoniopaso',256),'Antonio'),
            ('albertoB',SHA2('albertoBpaso',256),'AlbertoB');
            
    /* Usuario administrador con el rol de administrador */
        INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
            ('admin',SHA2('adminpaso',256),'Admin','administrador');


