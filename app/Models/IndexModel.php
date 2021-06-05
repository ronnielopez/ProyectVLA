<?php
namespace App\Models;

use CodeIgniter\Model;

    class IndexModel extends Model{

        //Consulta para todos los paises con el limitador del curso
        public function getPaises($curso){
            $paises = $this->db->query("SELECT pais , COUNT(idCurso) As 'Cantidad' FROM estudiante WHERE idCurso = $curso GROUP BY pais");
            //return los paises con el limitador
            return $paises->getResult();
            
        }

        //Consulta para todos los paises sin el limitador del curso
        public function getAllPaises(){
            $Apaises = $this->db->query("SELECT pais , COUNT(idCurso) As 'Cantidad' FROM estudiante GROUP BY pais");
            //return los paises sin el limitador
            return $Apaises->getResult();
            
        }
        //Consulta para todos los cursos
        public function getCursos(){
            $pais = $this->db->query("SELECT idCurso, nombreCurso FROM cursos");
            //return los cursos
            return $pais->getResult();
            
        }

    }

