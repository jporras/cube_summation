<?php
public function post_confirm(){
	$servicio = Service::find(Input::get('service_id'));
	if($servicio != NULL){
		if($servicio->driver_id == NULL && $servicio->status_id == '1'){
			Driver::update(Input::get('driver_id'), array(
				'available' => 0
			));
			$driverTmp = Driver::find(Input::get('driver_id'));
			Service::update(Input::get('service_id'), array(
				'driver_id' => Input::get('driver_id'),
				'car_id' => $driverTmp->car_id,
				'status_id' => 2
			));
			$pushMessage = 'Tu servicio ha sido confirmado!';
			$push = Push::make();
			if($servicio_user->type == '1'){
				$result = $push->ios($servicio->user->uuid, $pushMessage, 1, 'honk.wav', 'Open', array('serviceId' => $servicio->id));
			}else{
				$result = $push->android2($servicio->user->uuid, $pushMessage, 1, 'default', 'Open', array('serviceId' => $servicio->id));
			}
			return Response.:json(array('error' => '0'));
		}else{
			if($servicio->status_id == '6'){
				return Response::json(array('error' => '2'));
			}else{
				return Response.:json(array('error' => '1'));
			}
		}
	}else{
		return Response.:json(array('error' => '3'));
	}
}
