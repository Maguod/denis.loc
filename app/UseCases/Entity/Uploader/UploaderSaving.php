<?php

namespace App\UseCases\Entity\Uploader;
use App\Entity\Uploader;


class UploaderSaving
{
    private $uploader;
    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function updateUploader(array $data )
    {
          foreach($data as $key => $up) {
              $item = $this->uploader->where([
                  ['seller' , $up['seller']],
                  ['code' , $up['code']],
                  ['note' , $up['note']],

              ])->first();
              if($item === null) {
                  $this->uploader->store($up);
              }else {
                  $this->uploader->editPrice($data);
              }

          }
    }
}