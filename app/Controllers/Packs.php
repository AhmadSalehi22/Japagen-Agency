<?php

namespace App\Controllers;

use App\Models\PackModel;
use App\Models\HotelModel;
use App\Models\ReserveModel;
use App\Models\TourModel;
use App\Models\FlightModel;
use CodeIgniter\Controller;

class Packs extends Controller
{
    public function getList()
    {
        $model = new PackModel();
        $data['packages'] = $model->findAll();
        $data['content'] = view('packs/list', $data);
        echo view('templates/main', $data);
    }

    public function getManage()
    {
        $model = new PackModel();
        $data['packages'] = $model->findAll();
        $data['content'] = view('packs/manage', $data);
        echo view('templates/main', $data);
    }

    public function getAdd()
    {
        helper('form');
        $data['content'] = view('packs/add');
        return view('templates/main', $data);
    }


    public function postAdd()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            "name" => [
                "label" => "name",
                "rules" => "required"
            ],
            "description" => [
                "label" => "description",
                "rules" => "required"
            ],
            "start_date" => [
                "label" => "start_date",
                "rules" => "required"
            ],
            "end_date" => [
                "label" => "end_date",
                "rules" => "required"
            ],
            "price" => [
                "label" => "price",
                "rules" => "required"
            ],
            "flight_number" => [
                "label" => "flight_number",
                "rules" => "required"
            ],
            "origin" => [
                "label" => "origin",
                "rules" => "required"
            ],
            "destination" => [
                "label" => "destination",
                "rules" => "required"
            ],
            "flight_time" => [
                "label" => "flight_time",
                "rules" => "required"
            ],
            "hotel_name" => [
                "label" => "hotel_name",
                "rules" => "required"
            ],
            "hotel_rating" => [
                "label" => "hotel_rating",
                "rules" => "required"
            ],
            "location" => [
                "label" => "location",
                "rules" => "required"
            ],
            "options" => [
                "label" => "options",
                "rules" => "required"
            ],
            "day1" => [
                "label" => "day1",
                "rules" => "required"
            ],
            "day2" => [
                "label" => "day2",
                "rules" => "required"
            ],
            "day3" => [
                "label" => "day3",
                "rules" => "required"
            ]
        ];
        $data = [];
        $pack_model = new PackModel();
        $flight_model = new FlightModel();
        $hotel_model = new HotelModel();
        $tour_model = new TourModel();
        if ($this->validate($rules)) {
            $pack_status = $pack_model->save([
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'image' => $this->request->getPost('image'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'price' => $this->request->getPost('price'),
            ]);
            if ($pack_status) {
                $pack = $pack_model->where("name",$this->request->getPost('name'))->first();
                $pack_id = $pack->pack_id;
                $flight_status = $flight_model->save([
                    'pid' => $pack_id,
                    'flight_num' => $this->request->getPost('flight_number'),
                    'origin' => $this->request->getPost('origin'),
                    'destination' => $this->request->getPost('destination'),
                    'time' => $this->request->getPost('flight_time')
                ]);
                if($flight_status){
                    $hotel_status = $hotel_model->save([
                        'pid' => $pack_id,
                        'name' => $this->request->getPost('hotel_name'),
                        'rating' => $this->request->getPost('hotel_rating'),
                        'location' => $this->request->getPost('location'),
                        'options' => $this->request->getPost('options')
                    ]);
                    if($hotel_status){
                        $tour_status = $tour_model->save([
                            'pid' => $pack_id,
                            'day1' => $this->request->getPost('day1'),
                            'day2' => $this->request->getPost('day2'),
                            'day3' => $this->request->getPost('day3')
                        ]);
                        if($tour_status){
                            return redirect()->to(base_url('packs/add_ok'));
                        } elseif(!$tour_status){
                            return redirect()->to(base_url('packs/add_error'));
                        }
                    } elseif(!$hotel_status){
                        return redirect()->to(base_url('packs/add_error'));
                    }
                } elseif(!$flight_status){
                    return redirect()->to(base_url('packs/add_error'));
                }
            } elseif(!$pack_status){
                return redirect()->to(base_url('packs/add_error'));
            }
        } else {
            $data["errors"] = $validation->getErrors();
        }
        $data['content'] = view('packs/add', $data);
        echo view('templates/main', $data);
    }

    public function getAdd_ok()
    {
        $data['content'] = view('packs/add_ok');
        return view('templates/main', $data);
    }

    public function getAdd_error()
    {
        $data['content'] = view('packs/add_error');
        return view('templates/main', $data);
    }

    public function getUpdate()
    {
        helper('form');
        $model = new PackModel();
        $tour_model = new TourModel();
        $hotel_model = new HotelModel();
        $flight_model = new FlightModel();
        $data['packages'] = $model->findAll();
        $data['tours'] = $tour_model->findAll();
        $data['flights'] = $flight_model->findAll();
        $data['hotels'] = $hotel_model->findAll();
        $data['content'] = view('packs/update', $data);
        return view('templates/main', $data);
    }

    public function getInfo()
    {
        $model = new PackModel();
        $tour_model = new TourModel();
        $hotel_model = new HotelModel();
        $flight_model = new FlightModel();
        $data['packages'] = $model->findAll();
        $data['tours'] = $tour_model->findAll();
        $data['flights'] = $flight_model->findAll();
        $data['hotels'] = $hotel_model->findAll();
        $data['content'] = view('packs/info', $data);
        return view('templates/main', $data);
    }

    public function getDelete($pack_id){
        model('FlightModel')->deleteFlight($pack_id);
        model('HotelModel')->deleteHotel($pack_id);
        model('TourModel')->deleteTour($pack_id);
        model('PackModel')->deletePack($pack_id);
        return redirect()->to(base_url('packs/manage'));
    }

    public function postUpdate()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            "name" => [
                "label" => "name",
                "rules" => "required"
            ],
            "description" => [
                "label" => "description",
                "rules" => "required"
            ],
            "start_date" => [
                "label" => "start_date",
                "rules" => "required"
            ],
            "end_date" => [
                "label" => "end_date",
                "rules" => "required"
            ],
            "price" => [
                "label" => "price",
                "rules" => "required"
            ],
            "flight_number" => [
                "label" => "flight_number",
                "rules" => "required"
            ],
            "origin" => [
                "label" => "origin",
                "rules" => "required"
            ],
            "destination" => [
                "label" => "destination",
                "rules" => "required"
            ],
            "flight_time" => [
                "label" => "flight_time",
                "rules" => "required"
            ],
            "hotel_name" => [
                "label" => "hotel_name",
                "rules" => "required"
            ],
            "hotel_rating" => [
                "label" => "hotel_rating",
                "rules" => "required"
            ],
            "location" => [
                "label" => "location",
                "rules" => "required"
            ],
            "options" => [
                "label" => "options",
                "rules" => "required"
            ],
            "day1" => [
                "label" => "day1",
                "rules" => "required"
            ],
            "day2" => [
                "label" => "day2",
                "rules" => "required"
            ],
            "day3" => [
                "label" => "day3",
                "rules" => "required"
            ]
        ];
        $data = [];
        $pack_id = $this->request->getPost('pack_id');
        $pack_model = new PackModel();
        $tour_model = new TourModel();
        $flight_model = new FlightModel();
        $hotel_model = new HotelModel();
        if ($this->validate($rules)) {
            $tour_data = [
                'pid' => $pack_id,
                'day1' => $this->request->getPost('day1'),
                'day2' => $this->request->getPost('day2'),
                'day3' => $this->request->getPost('day3')
            ];
            $tour_status = $tour_model->update($pack_id, $tour_data);
            if($tour_status){
                $hotel_data = [
                    'pid' => $pack_id,
                    'name' => $this->request->getPost('hotel_name'),
                    'rating' => $this->request->getPost('hotel_rating'),
                    'location' => $this->request->getPost('location'),
                    'options' => $this->request->getPost('options')
                ];
                $hotel_status = $hotel_model->update($pack_id, $hotel_data);
                if($hotel_status){
                    $flight_data = [
                        'pid' => $pack_id,
                        'flight_num' => $this->request->getPost('flight_number'),
                        'origin' => $this->request->getPost('origin'),
                        'destination' => $this->request->getPost('destination'),
                        'time' => $this->request->getPost('flight_time')
                    ];
                    $flight_status = $flight_model->update($pack_id, $flight_data);
                    if($flight_status){
                        $pack_data = [
                            'name' => $this->request->getPost('name'),
                            'description' => $this->request->getPost('description'),
                            'image' => $this->request->getPost('image'),
                            'start_date' => $this->request->getPost('start_date'),
                            'end_date' => $this->request->getPost('end_date'),
                            'price' => $this->request->getPost('price'),
                        ];
                        $pack_status = $pack_model->update($pack_id, $pack_data);
                        if ($pack_status) {
                            return redirect()->to(base_url('packs/update_ok'));
                        } elseif(!$pack_status) {
                            return redirect()->to(base_url('packs/update_error'));
                        }
                    } elseif(!$flight_status){
                        return redirect()->to(base_url('packs/update_error'));
                    }
                } elseif (!$hotel_status){
                    return redirect()->to(base_url('packs/update_error'));
                }
            } elseif(!$tour_status){
                return redirect()->to(base_url('packs/update_error'));
            }
        } else {
            $data["errors"] = $validation->getErrors();
        }
        $data['content'] = view('packs/update', $data);
        echo view('templates/main', $data);
    }

    public function getUpdate_ok()
    {
        $data['content'] = view('packs/update_ok');
        return view('templates/main', $data);
    }

    public function getUpdate_error()
    {
        $data['content'] = view('packs/update_error');
        return view('templates/main', $data);
    }

    public function getReserve()
    {
        helper('form');
        $model = new PackModel();
        $data['packages'] = $model->findAll();
        $data['content'] = view('packs/reserve', $data);
        return view('templates/main', $data);
    }

    public function getReserve_ok()
    {
        $data['content'] = view('packs/reserve_ok');
        return view('templates/main', $data);
    }

    public function getReserve_error()
    {
        $data['content'] = view('packs/reserve_error');
        return view('templates/main', $data);
    }

    public function postReserve()
    {
        helper('form');
        $resModel = new ReserveModel();
        $reserveStatus = $resModel->save([
            'pack_id' => $this->request->getPost('pack_id'),
            'user_id' => session('user')->id,
            'date' => date("Y-m-d"),
            'time' => date("H:i"),
        ]);
        if($reserveStatus){
            return redirect()->to(base_url('packs/reserve_ok'));
        } else{
            return redirect()->to(base_url('packs/reserve_error'));
        }
    }
}

?>