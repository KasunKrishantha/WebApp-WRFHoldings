<?php

class gen_model extends CI_Model{

    // this method Check the given username and password matches with the users table data

	public function userAuth($userInfo){

		$this->db->select("Username,UserPassword");
		$result = $this->db->get_where("user",$userInfo);


       
        
		if($result->num_rows == 1){
			
            $columnArray = array('Employee_idEmployee','Employee_Outlet_idOutlet','roleName');
            $where_arr = array('Username'=>$userInfo['Username']);
          
            $data = $this->getData($tablename='user',$columns_arr =$columnArray,$where_arr = $where_arr);

           
            
		return  $data;
		}
		else{
			return false;
		}
	}

    // This method returns the user list.It can also returns the users filtered by the search text

    function userListing($searchText = '')
    {
        
            $query = $this->db->query("select Outletname,idUser,Employee_idEmployee,idEmployee,Employee_Outlet_idOutlet,mobile,roleName,EmployeeFullName from user,employee,outlet where user.Employee_idEmployee=employee.idEmployee and employee.Outlet_idOutlet=outlet.idOutlet");

            $result=$query->result();
            return $result;
        
        
    }


	//this method insert data into a given table
	function insertData($tablename, $data_arr) {
        try {
            $this->db->insert($tablename, $data_arr);

            $ret = $this->db->insert_id() + 0;
            return $ret;
        } catch (Exception $err) {
            return $err->getMessage();
        }
    }    

    function updateRowWhere($table, $where = array(), $data = array()) {
    $this->db->where($where);
    $this->db->update($table, $data);
}


     //makes this to work with columns and without where,limit and offset
    function getData($tablename = '', $columns_arr = array(), $where_arr = array(), $limit = 0, $offset = 0, $orderby = array()) {
		$limit = ($limit == 0) ? Null : $limit;

        if (!empty($columns_arr)) {
            $this->db->select(implode(',', $columns_arr), FALSE);
        }

        if ($tablename == '') {
            return array();
        } else {
            $this->db->from($tablename);

            if (!empty($where_arr)) {
                $this->db->where($where_arr);
            }

            if ($limit > 0 AND $offset > 0) {
                $this->db->limit($limit, $offset);
            } elseif ($limit > 0 AND $offset == 0) {
                $this->db->limit($limit);
            }

            if (count($orderby) > 0) {
                $orderbyString = '';
                var_dump($orderby);
                foreach ($orderby as $orderclause) {

                    $orderbyString .= $orderclause["field"] . ' ' . $orderclause["order"] . ', ';
                }
                if (strlen($orderbyString) > 2) {
                    $orderbyString = substr($orderbyString, 0, strlen($orderbyString) - 2);
					var_dump($orderbyString);
                }
                $this->db->order_by($orderbyString);
            }

            $query = $this->db->get();
            return $query->result();
        }
    } 

    function getDataIn($tablename = '', $columns_arr = array(), $where_arr = array(), $limit = 0, $offset = 0, $orderby = array()) {
        $limit = ($limit == 0) ? Null : $limit;

        if (!empty($columns_arr)) {
            $this->db->select(implode(',', $columns_arr), FALSE);
        }

        if ($tablename == '') {
            return array();
        } else {
            $this->db->from($tablename);

            if (!empty($where_arr)) {
                $this->db->where_in($where_arr["KeyField"],$where_arr["values"]);
            }

            if ($limit > 0 AND $offset > 0) {
                $this->db->limit($limit, $offset);
            } elseif ($limit > 0 AND $offset == 0) {
                $this->db->limit($limit);
            }

            if (count($orderby) > 0) {
                $orderbyString = '';

                foreach ($orderby as $orderclause) {

                    $orderbyString .= $orderclause["field"] . ' ' . $orderclause["order"] . ', ';
                }
                if (strlen($orderbyString) > 2) {
                    $orderbyString = substr($orderbyString, 0, strlen($orderbyString) - 2);
                }
                $this->db->order_by($orderbyString);
            }

            $query = $this->db->get();

            return $query->result();
        }
    }


    public function petty($userInfo){


        $this->db->select("idPetty_Cash as petty");
        $this->db->from("petty_cash");

        $this->db->where_in("Petty_CashType",$userInfo);

       

        $res = $this->db->get();

        return $res->row()->petty;


    }

    function pettyCashExpenses($invoice_array){
        try {
            
            // $invoice_array['Collection_idCollection'] = $this->getMaxCollectionID();        


            $ret = $this->db->insert('outlet_expends_petty_cash', $pettycashexpences_array);

            // $ret = $this->db->insert_id() + 0;
            return $ret;

        } catch (Exception $err) {
            return $err->getMessage();
        }

        
    }

    public function updateData($tablename, $data_arr, $where_arr) {
        try {

            $this->db->update($tablename, $data_arr, $where_arr);
            $report = array();
            $report['error'] = $this->db->_error_number();
            $report['message'] = $this->db->_error_message();
            return $report;
        } catch (Exception $err) {

            return $err->getMessage();
        }
    }

    public function deleteData($tblName,$where){

      return $this->db->delete($tblName,$where);
    }

    public function deleteRecord($id){

    return $this->db->delete('Customer',['idCustomer'=>$id]);
}
}
