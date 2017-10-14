<?php
 return [
     'doctrine' => [
         'driver' => [
             'Super_driver' => [
                 'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                 'cache' => 'array',
                 'paths' => [
                     './module/CertAPI/src/V1/Entity',
                 ],
             ],
             'orm_default' => [
                 'drivers' => [
                     'CertAPI' => 'Super_driver',
                 ],
             ],
         ],
     ],
 
     // ...
];