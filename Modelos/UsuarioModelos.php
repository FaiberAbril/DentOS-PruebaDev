<?php

class UsuarioModel{
 
    private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=dentos', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


    public function Crear(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO Usuarios (Nombres,Apellidos,sexo,Telefono,FechaNacimiento,correo,password,direccion) 
		        VALUES (?, ?, ?, ?,?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombres'), 
				$data->__GET('Apellidos'), 
				$data->__GET('sexo'),
				$data->__GET('Telefono'),
                $data->__GET('FechaNacimiento'), 
				$data->__GET('correo'),
				$data->__GET('password'),
                $data->__GET('direccion')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


    
    public function Actualizar(Usuario $data)
	{
		try 
		{

         $sql = "UPDATE Usuarios SET 
                Nombres          = ?, 
                Apellidos        = ?,
                sexo            = ?, 
                Telefono        = ?,
                FechaNacimiento            = ?, 
                correo        = ?,
                password            = ?, 
                direccion = ?
                WHERE id = ?";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombres'), 
				$data->__GET('Apellidos'), 
				$data->__GET('sexo'),
				$data->__GET('Telefono'),
                $data->__GET('FechaNacimiento'), 
				$data->__GET('correo'),
				$data->__GET('password'),
                $data->__GET('direccion'),
                $data->__GET('id')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
  

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM Usuarios");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $usuario = new Usuario();

                $usuario->__SET('id', $r->id);
                $usuario->__SET('Nombres', $r->Nombres);
                $usuario->__SET('Apellidos', $r->Apellidos);
                $usuario->__SET('Sexo', $r->Sexo);
                $usuario->__SET('FechaNacimiento', $r->FechaNacimiento);
                $usuario->__SET('Telefono', $r->Telefono);
                $usuario->__SET('correo', $r->correo);
                $usuario->__SET('password', $r->password);
                $usuario->__SET('direccion', $r->direccion);

                $result[] = $usuario;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM Usuarios WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $usuario = new Usuario();

            $usuario->__SET('id', $r->id);
            $usuario->__SET('Nombres', $r->Nombres);
            $usuario->__SET('Apellidos', $r->Apellidos);
            $usuario->__SET('Sexo', $r->Sexo);
            $usuario->__SET('FechaNacimiento', $r->FechaNacimiento);
            $usuario->__SET('Telefono', $r->Telefono);
            $usuario->__SET('correo', $r->correo);
            $usuario->__SET('password', $r->password);
            $usuario->__SET('direccion', $r->direccion);
            

            return $usuario;

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM Usuarios WHERE id = ?");                      
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }





}
?>