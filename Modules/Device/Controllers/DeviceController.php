<?php

namespace Modules\Device\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Device\Models\DeviceModel;

class DeviceController extends BaseController
{
    public function index()
    {
        $device_obj = new DeviceModel();

        echo "<pre>";
        print_r($device_obj->findAll());
    }
}
