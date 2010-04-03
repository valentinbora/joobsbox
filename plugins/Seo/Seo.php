<?php
class Seo extends Joobsbox_Plugin_AdminBase
{
	function init() {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer'); 
        $this->view = $viewRenderer->view;
    }

    public function indexAction()
    {
        // Renders when the admin configuration panel is viewed
    }
  
    public function event_pre_dispatch()
    {
        $this->view->headMeta()->setName('description', 'enter description here');
        // $this->view->headMeta()->setHttpEquiv('keyValue', 'content');
    }
    
    public function event_view_job($job)
    {
        $jobs = $this->getModel('jobs');
        $job = $jobs->fetchJobById($job);
        $this->view->headMeta()->setName('description', $job['description']);
    }
}
