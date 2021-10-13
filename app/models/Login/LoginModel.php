<?php

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signin($cedula)
    {
        $sql = "SELECT CI, Password, Nombre FROM Empleado WHERE CI ='{$cedula}'";
        $result = $this->db->query($sql);
        if($result->num_rows)
         return $result;
        else{
            $sql = "SELECT CI, Password, Nombre FROM Cliente WHERE CI='{$cedula}'";
            return $this->db->query($sql);
        }
    }

    public function getTipoUsuario($cedula)
    {
        $sql = "SELECT CI FROM Empleado, Gerente WHERE CI ='{$cedula}' and  CI=CIGerente";
        $result = $this->db->query($sql);
        if($result ->num_rows)
            return "Gerente";
        else{
            $sql = "SELECT CI FROM Empleado, Chef WHERE CI ='{$cedula}' and  CI=CIChef";
            $result = $this->db->query($sql);
            if($result ->num_rows)
            return "Chef";
            else{
                $sql = "SELECT CI FROM Empleado, Administrativo WHERE CI ='{$cedula}' and  CI=CIAdministrativo";
                $result = $this->db->query($sql);
                if($result ->num_rows)
                return "Administrativo"; 
                else{
                    $sql = "SELECT CI FROM Empleado, Cocinero WHERE CI ='{$cedula}' and  CI=CICocinero";
                    $result = $this->db->query($sql);
                    if($result ->num_rows)
                    return "Cocinero"; 
                    else{
                        $sql = "SELECT CI FROM Empleado, Recepcionista WHERE CI ='{$cedula}' and  CI=CIRecepcionista";
                        $result = $this->db->query($sql);
                        if($result ->num_rows)
                        return "Recepcionista";
                        else{
                            $sql = "SELECT CI FROM Empleado, Mesero WHERE CI ='{$cedula}' and  CI=CIMesero";
                            $result = $this->db->query($sql);
                            if($result ->num_rows)
                            return "Mesero"; 
                            else{
                                $sql = "SELECT CI FROM Cliente WHERE CI ='{$cedula}'";
                                $result = $this->db->query($sql);
                                if($result ->num_rows)
                                return "Cliente"; 
                            }
                        }
                    }
                }   
            }
        }
    }
}