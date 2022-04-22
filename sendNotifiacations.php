$this->common_model->updateData('notifications', 
      array('notification'=>$notific, 
            'message'=>$message, 
            'status'=>0,
            'creatorType'=>'provider', 
            'notificationFrom'=>$doctorDetails->id, 
            'notificationTo'=>$userDetails->id), 
            array('notificationFor'=>'Lab',
                  'appointmentId'=>$appointmentId
                 )
      );                  
                
    if($doctorDetails->notificationSend == 0){
                    
                    if($doctorDetails->deviceType=='ios'){
                        $notification=ios_notification($userDetails->deviceId,
                        $userDetails->deviceType,
                        $message,
                        $type='patient');
                    }
                    if($doctorDetails->deviceType=='android'){
                        $notification=android_notification($userDetails->deviceId,
                        $userDetails->deviceType,
                        $message,
                        $type='patient');
                    }
                }
                $this->session->set_flashdata('success_msg', 'status change sucessfully.');
                echo "success";die;
