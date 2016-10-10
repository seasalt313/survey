<?php

	class survey_Controller extends BaseController
	{

		public function index()

		{


			$this->addCss('/css/survey.css');
			$this->view->set_filename('survey/index');

			// hard code meta for page
			$this->layout->metaTitle       = "Thank You For Participating in our Spring Cleaning Survey!";
			$this->layout->metaDescription = "Every year we ask our best customers what we are doing well and what we can do better. We want to thank all participants for making this a great Heels.com promotion.";
			$this->layout->metaKeywords    = "";

			$this->layout->content = $this->view->render();
			$this->layout->render(true);
		}


		public function add($type = false)
		{

			if ($this->isAjax) {
				$ajax_response = array('success' => false, 'message' => false);
				try {

					if (!$type) {
						throw new Exception("No type specified for survey");
					}

					$data          = array();
					$data['email'] = $this->input->post('email', false);

					switch ($type) {
						case "vee24":

							if ($data['email']) {
								//serialize the data
								//doing that in the model function now

								//add the survey
								//$surveyModel = new Survey_Model();
								//$surveyModel->add($data);
								$alertModel = new Alert_Model;
								$result     = $alertModel->add($data['email'], 'newsletter', 0);
								if ($result !== true) {
									//if they weren't added we should just ignore it here for now
									//since it probably means they are already in the db.
								}

								// set the response message
								//$this->layout->set_filename('layouts/ajax');
								$this->view->set_filename("survey/thankyou/$type");
								$ajax_response['success'] = true;
								$ajax_response['html']    = $this->view->render(false);

							} else {
								throw new Exception("You did not enter all the required info.");
							}

							//BEGIN vee24 integration
							/*
													if(!stristr($_SERVER['HTTP_USER_AGENT'],"Chrome") && !stristr($_SERVER['HTTP_USER_AGENT'],"Safari")){
														//set up client data...
														// Add our new contact
														$sitename = "Heels";

														$vee24Guid = cookie::get("veedeskHeels");
														$SOAPAuth = "grt23rfT4g3";
														if(!$vee24Guid){
															$vee24Guid=$this->input->post('userguid',false);
														}

														$data['list_name'] = "Customer Information";
														//create our handy-dandy vee24 client to do the requests all nice-like.
														//All args are optional, but if you don't set them now, you'll have to set
														//them later anyway.

														$request_data[] = $data;

														//$data = array();
														$data['list_name'] = "Survey";
														$request_data[] = $data;

														$vee24Client = new Vee24_Client($SOAPAuth,$sitename,$vee24Guid);

														//Call the SetCRMData function of the vee24 api.
														//The $vee24Guid is optional if you've already set it, but it's here for clarity.
														//The data parameter here should be an array of list information. Each list element
														//should just be a flat array with the list_name and all the relevent data required by the list.
														$vee24_result = $vee24Client->SetCRMData($request_data,$vee24Guid);

														if($vee24_result){
															$ajax_response['success'] = true;
															$ajax_response['message'] .= "User successfully added to vee24 via API";
														}else{
															throw new Exception($vee24Client->getErrorString());
														}
													}
							*/
							//END vee24 integration
							break;


						default:
							throw new Exception("Invalid survey type.");
							break;

					}


				} catch (Exception $e) {
					$ajax_response['success'] = false;
					$ajax_response['error']   = $e->getMessage();
				}

				echo json_encode($ajax_response);
				exit;
			}

		}

		//new Sex and The City 2 Landing Page quiz by justin holt

		public function sexandthecity2()

		{


			$this->addCss('/css/survey.css');
			$this->addCss('/css/static.css');

			//minify/combine the css...
			if ($this->input->get('minify', "true") == "true") {
				$this->css = heels::combine('css', $this->css);
				$this->js  = heels::combine('js', $this->js);
			}
			// add right blocks
			$blocks = new BaseView;
			$blocks->set_filename('blocks/policy');
			$this->view->policyBlock = $blocks->render();

			$this->view->set_filename('survey/sexandthecity2');

			// hard code meta for page
			$this->layout->metaTitle       = "What is Your Sex and The City Style? Find out at Heels.com";
			$this->layout->metaDescription = "Carrie, Samantha, Charlotte and Miranda are back and in honor of the Sex and The City 2 Movie, we're celebrating their glam style. Take this short quiz to find out which character inspires your personal fashion.";
			$this->layout->metaKeywords    = "";

			$this->layout->content = $this->view->render();
			$this->layout->render(true);
		}
	}