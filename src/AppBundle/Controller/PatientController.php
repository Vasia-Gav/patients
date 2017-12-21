<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class PatientController extends BaseController
{
    /**
     * @Route(path="/patients", methods={"GET"}, name="patients")
     *
     * @ApiDoc(
     *     resource = true,
     *     description = "Get list of patients",
     *     statusCodes = {
     *         200 = "Returned when successful",
     *         304 = "Returned from cache"
     *     },
     *      parameters={
     *          {"name"="page", "dataType"="int", "required"=false, "description"="Page number"},
     *          {"name"="per-page", "dataType"="int", "required"=false, "description"="Items on page count"},
     *          {"name"="expand", "dataType"="string", "required"=false, "description"="Comma separated fields list to expand"},
     *          {"name"="order-by", "dataType"="string", "required"=false, "description"="sorting by fields (pattern: 'field|order' eg 'name|asc' )"}
     *     },
     *     section = "Patients",
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        return $this->action("action.patient.list");
    }


    /**
     * @Route(path="/groups", methods={"GET"}, name="groups")
     *
     * @ApiDoc(
     *     resource = true,
     *     description = "Get list of groups",
     *     statusCodes = {
     *         200 = "Returned when successful",
     *         304 = "Returned from cache"
     *     },
     *      parameters={
     *          {"name"="page", "dataType"="int", "required"=false, "description"="Page number"},
     *          {"name"="per-page", "dataType"="int", "required"=false, "description"="Items on page count"},
     *          {"name"="expand", "dataType"="string", "required"=false, "description"="Comma separated fields list to expand"},
     *          {"name"="order-by", "dataType"="string", "required"=false, "description"="sorting by fields (pattern: 'field|order' eg 'name|asc' )"}
     *     },
     *     section = "Groups",
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */ 
    public function listGroupAction()
    {
        return $this->action("action.group.list");
    }
}