<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\Patient;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\scalar;

class PatientNormalizer implements NormalizerInterface
{
    /**
     * @param Patient $object
     * @param null $format
     * @param array $context
     * @return array
     */
    public function normalize($object, $format = null, array $context = array())
    {
        return [
            'id' => $object->getId(),
            'label' => $object->getName(),
            'group' => implode(', ', $object->getGroups()->toArray()),
            'status' => $object->getStatus(),
            'details' => [
                'email' => $object->getEmail(),
                'tel' => $object->getPhone(),
            ]
        ];
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Patient;
    }

}