<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Systems extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('systems_model');
    }
    
    public function activeHospitals() {
        $data['hospitals'] = array(); 
        $hospitalLists = $this->db->get('hospital')->result();
            foreach ($hospitalLists as $hospitalList) {
                $this->db->where('id', $hospitalList->ion_user_id);
                $status = $this->db->get('users')->row();
                if ($status->active == "1") {
                    array_push($data['hospitals'], $hospitalList);
                }
            }
        $this->load->view('home/dashboard');
        $this->load->view('active_hospital', $data);
        $this->load->view('home/footer');
    }
    
    public function inactiveHospitals() {
        $data['hospitals'] = array(); 
        $hospitalLists = $this->db->get('hospital')->result();
            foreach ($hospitalLists as $hospitalList) {
                $this->db->where('id', $hospitalList->ion_user_id);
                $status = $this->db->get('users')->row();
                if ($status->active == "0") {
                    array_push($data['hospitals'], $hospitalList);
                }
            }
        $this->load->view('home/dashboard');
        $this->load->view('inactive_hospital', $data);
        $this->load->view('home/footer');
    }
    
    public function expiredHospitals() {
        $data['hospitals'] = array(); 
        $data['hospitalExpiredList'] = $this->db->get('hospital_payment')->result();
            
            
        $this->load->view('home/dashboard');
        $this->load->view('expired_hospital', $data);
        $this->load->view('home/footer');
    }
    
    public function registeredDoctor() {
        $data['doctors'] = $this->db->get('doctor')->result();
           $this->load->view('home/dashboard');
        $this->load->view('registered_doctor', $data);
        $this->load->view('home/footer');
        
    }
    
    function getDoctor() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['doctors'] = $this->systems_model->getDoctorBysearch($search);
            } else {
                $data['doctors'] = $this->systems_model->getDoctor();
            }
        } else {
            if (!empty($search)) {
                $data['doctors'] = $this->systems_model->getDoctorByLimitBySearch($limit, $start, $search);
            } else {
                $data['doctors'] = $this->systems_model->getDoctorByLimit($limit, $start);
            }
        }
        

        foreach ($data['doctors'] as $doctor) {
            $info[] = array(
                $doctor->id,
                $doctor->name,
                $doctor->phone,
                $this->db->get_where('hospital', array('id' => $doctor->hospital_id))->row()->name,
                    //  $options2
            );
        }

        if (!empty($data['doctors'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('doctor')->num_rows(),
                "recordsFiltered" => $this->db->get('doctor')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }
    
    public function registeredPatient() {
        $data['patients'] = $this->db->get('patient')->result();
           $this->load->view('home/dashboard');
        $this->load->view('registered_patient', $data);
        $this->load->view('home/footer');
        
    }
    
    function getPatient() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['patients'] = $this->systems_model->getPatientBysearch($search);
            } else {
                $data['patients'] = $this->systems_model->getPatient();
            }
        } else {
            if (!empty($search)) {
                $data['patients'] = $this->systems_model->getPatientByLimitBySearch($limit, $start, $search);
            } else {
                $data['patients'] = $this->systems_model->getPatientByLimit($limit, $start);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['patients'] as $patient) {
            $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $this->db->get_where('hospital', array('id' => $patient->hospital_id))->row()->name,
                        //  $options2
                );
            
        }

        if (!empty($data['patients'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('patient')->num_rows(),
                "recordsFiltered" => $this->db->get('patient')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }
}

