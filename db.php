<?php
class Database
{
    private $host = 'agendamedicabd.crdj0xxinw38.us-east-1.rds.amazonaws.com';
    private $db = 'agendabd';
    private $user = 'admin';
    private $pass = 'Jebois23';
    private $charset = 'utf8mb4';
    private $pdo;

    // Conectar a la base de datos
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset;";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    // Validar usuario
    public function validarUsuario($user, $password)
    {
        $sql = "Select count(*) AS cantidad FROM usuarios WHERE email = :mail AND contraseña = :pass";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":mail", $user);
        $query->bindParam(":pass", $password);
        $query->execute();
        $resultado = $query->fetch();
        return $resultado['cantidad'];
    }
    // Validar rol
    public function validarRol($user, $password)
    {
        $sql = "Select idrol AS rol FROM usuarios WHERE email = :mail AND contraseña = :pass";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":mail", $user);
        $query->bindParam(":pass", $password);
        $query->execute();
        $resultado = $query->fetch();
        return $resultado['rol'];
    }
    // Registrar usuario
    public function insertarUsuarioPaciente($name, $app, $apm, $email, $pass, $fecha)
    {
        $sql = "INSERT INTO usuarios (nombre, ap_paterno, ap_materno, email, contraseña, idrol, fecha_nacimiento, edad) VALUES (:nombre , :app , :apm , :mail , :pass , '3', :fecha , 0 );";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":nombre", $name);
        $query->bindParam(":app", $app);
        $query->bindParam(":apm", $apm);
        $query->bindParam(":mail", $email);
        $query->bindParam(":pass", $pass);
        $query->bindParam(":fecha", $fecha);
        $query->execute();
        return true;
    }
    public function insertarUsuario($name, $app, $apm, $email, $pass, $fecha, $rol)
    {
        $sql = "INSERT INTO usuarios (nombre, ap_paterno, ap_materno, email, contraseña, idrol, fecha_nacimiento, edad) VALUES (:nombre , :app , :apm , :mail , :pass , :rol , :fecha , 0 );";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":nombre", $name);
        $query->bindParam(":app", $app);
        $query->bindParam(":apm", $apm);
        $query->bindParam(":mail", $email);
        $query->bindParam(":pass", $pass);
        $query->bindParam(":fecha", $fecha);
        $query->bindParam(":rol", $rol);
        $query->execute();
        return true;
    }
    // Validar usuario
    public function validarCorreo($mail)
    {
        $sql = "Select count(*) AS cantidad FROM usuarios WHERE email = :mail";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":mail", $mail);
        $query->execute();
        $resultado = $query->fetch();
        return $resultado['cantidad'];
    }
    // Obtener un id de usuario por email
    public function getIdUsuario($mail)
    {
        $stmt = $this->pdo->prepare('SELECT id FROM usuarios where email = ?');
        $stmt->execute([$mail]);
        return $stmt->fetch();
    }
    // Obtener un id de paciente por id de usuario
    public function getIdPaciente($id)
    {
        $stmt = $this->pdo->prepare('SELECT idpacientes FROM pacientes where idusuario = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    // Registrar usuario
    public function insertarPaciente($id)
    {
        $sql = "INSERT INTO pacientes (idusuario) VALUES (:idusuario);";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":idusuario", $id);
        $query->execute();
        return true;
    }



    // Obtener todas la citas de un paciente
    public function getCitas($id)
    {
        $stmt = $this->pdo->prepare('SELECT C.idcita as N_Cita, concat(U.nombre," ",U.ap_paterno," ",U.ap_materno) as Paciente, concat(Doc.nombre," ",Doc.ap_paterno," ",Doc.ap_materno) as Doctor, Es.nombre as Especialidad, C.Sala, C.Notas, C.fecha FROM citas as C inner join pacientes as P on C.paciente = P.idpacientes inner join doctores as D on C.doctor = D.iddoctores inner join usuarios as Doc on Doc.id = D.iduser inner join usuarios as U on P.idusuario = U.id inner join especialidad as Es on C.especialidad = Es.idespecialidad where C.paciente = ?');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    // Obtener una cita por id
    public function getCita($id)
    {
        $stmt = $this->pdo->prepare('SELECT C.idcita as N_Cita, concat(U.nombre," ",U.ap_paterno," ",U.ap_materno) as Paciente, Doc.nombre as Doctor, Es.nombre as Especialidad, C.Sala, C.Notas, C.fecha FROM citas as C inner join pacientes as P on C.paciente = P.idpacientes inner join doctores as D on C.doctor = D.iddoctores inner join usuarios as Doc on Doc.id = D.iduser inner join usuarios as U on P.idusuario = U.id inner join especialidad as Es on C.especialidad = Es.idespecialidad where C.idcita = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    // Obtener un paciente por id
    public function getPaciente($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pacientes as P inner join usuarios as U on U.id = P.idusuario WHERE P.idusuario = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    // Obtener todos los docores
    public function getDoctores()
    {
        $stmt = $this->pdo->prepare('SELECT D.iddoctores as id, U.nombre as nombre FROM doctores as D inner join usuarios as U on D.iduser = U.id');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Obtener todas las especialidades
    public function getEspecialidades()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM especialidad');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Crear una cita
    public function createCita($paciente, $doctor, $especialidad, $sala, $fecha, $notas)
    {
        $stmt = $this->pdo->prepare('INSERT INTO citas (paciente, doctor, especialidad, sala, fecha, notas) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$paciente, $doctor, $especialidad, $sala, $fecha, $notas]);
    }

    // Actualizar una cita
    public function updateCita($id, $doctor, $especialidad, $sala, $notas, $Hora)
    {
        $stmt = $this->pdo->prepare('UPDATE citas SET doctor = ?, especialidad = ?, sala = ?, notas = ?, fecha = ? WHERE idcita = ?');
        return $stmt->execute([$doctor, $especialidad, $sala, $notas, $Hora, $id]);
    }

    // Eliminar una cita
    public function deleteCita($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM citas WHERE idcita = ?');
        return $stmt->execute([$id]);
    }


    // consultas para doctor
    public function getAllCitasDoc($id)
    {
        $stmt = $this->pdo->prepare('SELECT C.idcita as N_Cita, concat(U.nombre," ",U.ap_paterno," ",U.ap_materno) as Paciente, concat(Doc.nombre," ",Doc.ap_paterno," ",Doc.ap_materno) as Doctor, Es.nombre as Especialidad, C.Sala, C.Notas, C.fecha FROM citas as C inner join pacientes as P on C.paciente = P.idpacientes inner join doctores as D on C.doctor = D.iddoctores inner join usuarios as Doc on Doc.id = D.iduser inner join usuarios as U on P.idusuario = U.id inner join especialidad as Es on C.especialidad = Es.idespecialidad where Doc.id = ? ');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    

    // consultas para administrador
    public function getAllCitas()
    {
        $stmt = $this->pdo->prepare('SELECT C.idcita as N_Cita, concat(U.nombre," ",U.ap_paterno," ",U.ap_materno) as Paciente, concat(Doc.nombre," ",Doc.ap_paterno," ",Doc.ap_materno) as Doctor, Es.nombre as Especialidad, C.Sala, C.Notas, C.fecha FROM citas as C inner join pacientes as P on C.paciente = P.idpacientes inner join doctores as D on C.doctor = D.iddoctores inner join usuarios as Doc on Doc.id = D.iduser inner join usuarios as U on P.idusuario = U.id inner join especialidad as Es on C.especialidad = Es.idespecialidad ORDER BY N_Cita' );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertarDoctor($id)
    {
        $sql = "INSERT INTO doctores (iduser) VALUES (:idusuario);";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":idusuario", $id);
        $query->execute();
        return true;
    }
    public function getAllUsuarios()
    {
        $stmt = $this->pdo->prepare('SELECT U.id, U.nombre, U.ap_paterno, U.ap_materno, U.email, U.fecha_nacimiento, R.nombre as rolname FROM usuarios as U inner join roles as R on U.idrol = R.id ORDER BY id');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllPacientes()
    {
        $stmt = $this->pdo->prepare('SELECT U.id as id, concat(U.nombre," ",U.ap_paterno," ",U.ap_materno) as nombre, P.idpacientes as N_paciente, P.idpacientes as paciente FROM usuarios as U inner join pacientes as P on U.id= P.idusuario where U.idrol = 3');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Eliminar una usuario
    public function deleteUsuario($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM citas WHERE idcita = ?');
        return $stmt->execute([$id]);
    }
    // Obtener un usuario
    public function getUsuario($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios where id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Actualizar un usuario
    public function updateUsuario($id, $nombre, $apPa, $apMa, $email, $idrol, $fecha)
    {
        $stmt = $this->pdo->prepare('UPDATE usuarios SET nombre = ?, ap_paterno = ?, ap_materno = ?, email = ?, idrol = ?, fecha_nacimiento = ? WHERE id = ?');
        return $stmt->execute([$nombre, $apPa, $apMa, $email, $idrol, $fecha, $id]);
    }
}
