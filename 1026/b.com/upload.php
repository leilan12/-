<?php
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] < 2000000)) {

           if ($_FILES["file"]["error"] > 0) {

                    $data = array(
                    'error' =>  $_FILES["file"]["error"],
                    'msg'   => 'some error happend',
                    'imgurl' => null,);

                     $url = 'http://a.com/1026/a.com/trans.php';
                     $data = json_encode($data);//PHP json_encode() ���ڶԱ������� JSON ���룬�ú������ִ�гɹ����� JSON ���ݣ����򷵻� FALSE ��
                     header('Location:' .$url . '?data=' . $data);
           }else {

                if (file_exists("upload/" . $_FILES["file"]["name"])) {

                         $data = array(
                         'error' =>  null,
                         'msg'   => 'file already exists',
                         'imgurl' => null,);

                         $url = 'http://a.com/1026/a.com/trans.php';
                         $data = json_encode($data);// JSON.parse() ����������ת��Ϊ JavaScript ����
                         header('Location:' .$url . '?data=' . $data);
                } else {

                           move_uploaded_file($_FILES["file"]["tmp_name"],
                           "upload/" . $_FILES["file"]["name"]);

                            $data = array(
                            'error' =>  null,
                            'msg'   => 'upload success',
                            'imgurl' => 'http://b.com/1026/b.com/upload/'. $_FILES["file"]["name"],);

                            $url = 'http://a.com/1026/a.com/trans.php';
                             $data = json_encode($data);
                             header('Location:' .$url . '?data=' . $data);
                }
           }

        } else {
                              $data = array(
                              'error' =>  null,
                              'msg'   => 'file type not allowed',
                              'imgurl' =>null,);

                             $url = 'http://a.com/1026/a.com/trans.php';
                             $data = json_encode($data);
                             header('Location:' .$url . '?data=' . $data);
        }