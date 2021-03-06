<?php
use Symfony\Component\Validator\Constraints\Length;
require_once (__DIR__ . '/../../../bootstrap.php');
require_once (__DIR__ . '/../../../app/application.php');
require_once (__DIR__ . '/../Logic/email_template.php');
require_once (__DIR__ . "/../Logic/mail.php");

/* required entities */
require_once (__DIR__ . '/../Entity/LuFee.php');
require_once (__DIR__ . '/../Entity/Booking.php');
require_once (__DIR__ . '/../Entity/BookingBookingStatus.php');
require_once (__DIR__ . '/../Entity/BookingAddress.php');
require_once (__DIR__ . '/../Entity/BookingTime.php');
require_once (__DIR__ . '/../Entity/User.php');
require_once (__DIR__ . '/../Entity/UserProfile.php');
require_once (__DIR__ . '/../Entity/LuAccountStatus.php');
require_once (__DIR__ . '/../Entity/LuBookingStatus.php');
require_once (__DIR__ . '/../Entity/LuUserRole.php');
require_once (__DIR__ . '/../Entity/Address.php');
require_once (__DIR__ . '/../Entity/UserUserService.php');
require_once (__DIR__ . '/../Entity/LuService.php');
require_once (__DIR__ . '/../Entity/LuServiceType.php');
require_once (__DIR__ . '/../Entity/BookingSummaryView.php');
require_once (__DIR__ . '/../Entity/BookingComments.php');
require_once (__DIR__ . '/../Entity/BookingUserProfile.php');
require_once (__DIR__ . '/../Entity/PartnerRating.php');
require_once (__DIR__ . '/../Entity/BookingPartner.php');
require_once (__DIR__ . '/../Controller/controller_lookup.php');
require_once (__DIR__ . '/../Entity/LuDatechangeReasons.php');
require_once (__DIR__ . '/../Controller/controller_partner_profile.php');

require_once ('controller_lookup.php');
require_once ('controller_booking_services.php');
require_once ('controller_partner_services.php');

// Logger>>>>>>> 27207fc6249eff3b0b7a3068ad36679792289d7b
// require_once('../logger/php/Logger.php');

require_once ('controller_logger.php');

if (isset ( $_GET ['prepdata'] )) {
	
	if ($_GET ['prepdata']) :
		
		// echo myvariable();
		
		$activeLookups = getAllActiveLookupsByClass ( $entityManager, 'RegionService' );
		
		foreach ( $activeLookups as &$value ) {
			$amount = 100 + rand ( 150, 1000 );
			
			$regionService = new RegionServicePrice ();
			$regionService->setDateAdded ( new DateTime () );
			$regionService->setActive ( 1 );
			$regionService->setAmount ( $amount );
			$regionService->setDiscountPercentage ( 0.0 );
			$regionService->setRegionService ( $value );
			$entityManager->persist ( $regionService );
			$entityManager->flush ();
		}
		
		return 'done';
	
	
	
	
	
	
	

	endif;
}

if (isset ( $_GET ['getBestPartners'] )) {
	if ($_GET ['getBestPartners']) :
		
		try {
			// session_start ();
		} catch ( Exception $e ) {
		}
		
		getBestPartners ( $entityManager );
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['resendEmail'] )) {
	if ($_GET ['resendEmail']) :
		resendEmail ( $entityManager );
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['getServicePrices'] )) {
	if ($_GET ['getServicePrices']) :
		getServicePrices ( $entityManager );
	endif;
}

if (isset ( $_GET ['getBookingsInCalender'] )) {
	if ($_GET ['getBookingsInCalender']) :
		try {
			session_start ();
		} catch ( Exception $e ) {
		}
		// initializeSession();
		getBookingsInCalender ( $entityManager );
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['completeBooking'] )) {
	if ($_GET ['completeBooking']) :
		try {
			session_start ();
		} catch ( Exception $e ) {
		}
		
		completeBooking ( $entityManager );
	
	
	
	
	
	
	

	endif;
}

if (isset ( $_POST ['completeBookingByAdmin'] )) {
	if ($_POST ['completeBookingByAdmin']) :
		
		completeBookingByAdmin ( $entityManager );
	
	
	
	
	
	
	
	
	

	endif;
}

if (isset ( $_POST ['acceptBooking'] )) {
	if ($_POST ['acceptBooking']) :
		
		acceptBooking ( $entityManager );
	
	
	
	
	
	




	endif;
}

if (isset ( $_POST ['cancelBooking'] )) {
	if ($_POST ['cancelBooking']) :
		
		cancelBooking ( $entityManager );
	
	
	
	
	
	




	endif;
}

if (isset ( $_GET ['getBookingDetails'] )) {
	if ($_GET ['getBookingDetails']) :
		getBookingDetails ( $entityManager );
	
	
	
	
	
	
	
	
	
	

	endif;
}

if (isset ( $_POST ['updateBooking'] )) {
	if ($_POST ['updateBooking']) :
		updateBooking ( $entityManager );
	
	
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_POST ['updateBookingComments'] )) {
	if ($_POST ['updateBookingComments']) :
		updateBookingComments ( $entityManager );
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['getBookingViewByStatus'] )) {
	if ($_GET ['getBookingViewByStatus']) :
		getBookingViewByStatus ( $entityManager );
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['getBookingStatus'] )) {
	if ($_GET ['getBookingStatus']) :
		getBookingStatus ( $entityManager );
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['getDateChangeReasons'] )) {
	if ($_GET ['getDateChangeReasons']) :
		getDateChangeReasons ( $entityManager );
	
	
	
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_POST ['changeBookingDateTime'] )) {
	if ($_POST ['changeBookingDateTime']) :
		changeBookingDateTime ( $entityManager );
	
	
	
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['acceptChanges'] )) {
	if ($_GET ['acceptChanges']) :
		acceptChanges ( $entityManager );
	
	
	
	
	
	
	

	endif;
}

if (isset ( $_GET ['cancelBookingForRebook'] )) {
	if ($_GET ['cancelBookingForRebook']) :
		cancelBookingForRebook ( $entityManager );
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_GET ['changeBookingPartnerByAdmin'] )) {
	if ($_GET ['changeBookingPartnerByAdmin']) :
		changeBookingPartnerByAdmin ( $entityManager );
	
	
	
	
	
	
	
	
	
	endif;
}

if (isset ( $_POST ['changeBookingDateTimeAndPartner'] )) {
	if ($_POST ['changeBookingDateTimeAndPartner']) :
		changeBookingDateTimeAndPartner ( $entityManager );
	
	
	
	
	
	
	
	

	endif;
}
function changeBookingDateTimeAndPartner($entityManager) {
	try {
		session_start ();
	} catch ( Exception $e ) {
	}
	
	try {
		$format = 'Y/m/d H:i';
		$dateStartTime = DateTime::createFromFormat ( $format, $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] );
		$dateEndTime = DateTime::createFromFormat ( $format, $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] );
		
		$dateEndTime->add ( new DateInterval ( 'PT3H' ) );
		
		$booking = getBookingByID ( $entityManager, $_POST ['changeBookingDateTimeAndPartner'] );
		if ($booking) {
			
			$newBookingTime = changeBookingTime ( $entityManager, $booking, $dateStartTime, $dateEndTime );
			
			if ($newBookingTime) {
				
				$bookingPartner = changeBookingPartner ( $entityManager, $booking, $_POST ['partner_id'] );
				
				if ($bookingPartner) {
					$note = "Admin updated partner to " . $bookingPartner->getUser ()->getUserProfile ()->getFirstName () . ' ' . $bookingPartner->getUser ()->getUserProfile ()->getSurname () . " and booking date time to " . $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] . ". Reason: " . $_POST ['newBookingTimeReason'];
					$bookingComments = addBookingComments ( $entityManager, $booking, $note, $_SESSION ['firstname'] );
					
					$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_AWAITING_CLIENT_CONFIRMATION' );
					
					if ($bookingBookingStatus) {
						if (send_booking_date_partner_changed_message ( $entityManager, $booking )) {
							$response ['status'] = 1;
							$response ['message'] = 'Successfully updated booking date and time and partner';
							$response ['booking_status'] = $bookingBookingStatus->getBookingBookingStatus ()->getName ();
							echo json_encode ( $response );
							return;
						}
					}
				}
			}
		}
		$response ['status'] = 1;
		$response ['message'] = "Successfully updated booking date and time and partner";
		echo json_encode ( $response );
		return;
	} catch ( Exception $e ) {
		getLogger ()->critical ( "Could not update booking date and time and partner: " . $e->getTraceAsString () );
	}
}
function changeBookingPartnerByAdmin($entityManager) {
	try {
		$booking = getBookingByID ( $entityManager, $_GET ['changeBookingPartnerByAdmin'] );
		if ($booking) {
			$bookingPartner = changeBookingPartner ( $entityManager, $booking, $_GET ['partner_id'] );
			
			if ($bookingPartner) {
				$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_AWAITING_CLIENT_CONFIRMATION' );
				
				if ($bookingBookingStatus) {
					if (send_booking_partner_changed_message ( $entityManager, $booking )) {
						$response ['status'] = 1;
						$response ['message'] = 'Successfully updated partner';
						$response ['booking_status'] = $bookingBookingStatus->getBookingBookingStatus ()->getName ();
						echo json_encode ( $response );
						return;
					}
				}
			}
		}
		
		$response ['status'] = 2;
		$response ['message'] = "Failed to update partner. Please contact system administrator";
		echo json_encode ( $response );
		return;
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
function acceptChanges($entityManager) {
	try {
		$booking = getBookingByIDAndUUID ( $entityManager, $_GET ['acceptChanges'], $_GET ['uuid'] );
		
		if ($booking) {
			$bookingStatus = getActiveBookingStatus ( $entityManager, $booking );
			
			if (strcmp ( $bookingStatus->getBookingBookingStatus ()->getName (), "BOOKING_AWAITING_CLIENT_CONFIRMATION" ) !== 0) {
				$response ['status'] = 2;
				$response ['message'] = "Failed to accept changes. Please contact system administrator";
				echo json_encode ( $response );
				return;
			}
			
			$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_ACTIVE' );
			
			if ($bookingBookingStatus) {
				$response ['status'] = 1;
				$response ['message'] = 'Thank you for accepting our changes.';
				echo json_encode ( $response );
				return;
			} else {
				$response ['status'] = 2;
				$response ['message'] = "Failed to accept changes. Please contact system administrator";
				echo json_encode ( $response );
				return;
			}
		}
		
		$response ['status'] = 2;
		$response ['message'] = "Failed to accept changes. Please contact system administrator";
		echo json_encode ( $response );
		return;
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
function changeBookingDateTime($entityManager) {
	try {
		session_start ();
	} catch ( Exception $e ) {
	}
	
	try {
		$format = 'Y/m/d H:i';
		$dateStartTime = DateTime::createFromFormat ( $format, $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] );
		$dateEndTime = DateTime::createFromFormat ( $format, $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] );
		
		$dateEndTime->add ( new DateInterval ( 'PT3H' ) );
		
		$booking = getBookingByID ( $entityManager, $_POST ['changeBookingDateTime'] );
		if ($booking) {
			
			$newBookingTime = changeBookingTime ( $entityManager, $booking, $dateStartTime, $dateEndTime );
			
			if ($newBookingTime) {
				$note = "Admin updated booking date time to " . $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] . ". Reason: " . $_POST ['newBookingTimeReason'];
				
				$bookingComments = addBookingComments ( $entityManager, $booking, $note, $_SESSION ['firstname'] );
				
				$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_AWAITING_CLIENT_CONFIRMATION' );
				
				if ($bookingBookingStatus) {
					if (send_booking_date_changed_message ( $entityManager, $booking, $note )) {
						$response ['status'] = 1;
						$response ['message'] = 'Successfully updated booking date and time';
						$response ['booking_status'] = $bookingBookingStatus->getBookingBookingStatus ()->getName ();
						echo json_encode ( $response );
						return;
					} else {
						$response ['status'] = 2;
						$response ['message'] = "Failed to update booking date and time, sending email failed";
						echo json_encode ( $response );
						return;
					}
				}
			}
		}
		$response ['status'] = 1;
		$response ['message'] = "Successfully updated booking date and time";
		echo json_encode ( $response );
		return;
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
function getDateChangeReasons($entityManager) {
	try {
		$DateChangeReasons = getAllActiveLookupsByClass ( $entityManager, 'LuDatechangeReasons' );
		$activeDateChangeReasons = array ();
		
		if ($DateChangeReasons) {
			foreach ( $DateChangeReasons as &$value ) {
				array_push ( $activeDateChangeReasons, $value->getReason () );
			}
			$response ['status'] = 1;
			$response ['ChangeDateReason'] = $activeDateChangeReasons;
			echo json_encode ( $response );
		} else {
			$response ['status'] = 2;
			$response ['ChangeDateReason'] = $activeDateChangeReasons;
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
function getBookingStatus($entityManager) {
	try {
		$BookingStatuses = getAllActiveLookupsByClass ( $entityManager, 'LuBookingStatus' );
		$activeBookingStatus = array ();
		if ($BookingStatuses) {
			foreach ( $BookingStatuses as &$value ) {
				array_push ( $activeBookingStatus, $value->getName () );
			}
			$response ['status'] = 1;
			$response ['bookingStatus'] = $activeBookingStatus;
			echo json_encode ( $response );
		} else {
			$response ['status'] = 2;
			$response ['bookingStatus'] = $activeBookingStatus;
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
function getBookingViewByStatus($entityManager) {
	try {
		$booking_objects = $entityManager->getRepository ( 'BookingSummaryView' )->findBy ( array (
				'latestBookingStatus' => $_GET ['getBookingViewByStatus'] 
		), array (
				'bookingId' => 'DESC' 
		) );
		
		$activeBookingsArray = array ();
		
		if ($booking_objects) {
			foreach ( $booking_objects as &$value ) {
				
				$TempBookingArray = array ();
				array_push ( $TempBookingArray, $value->getBookingId () );
				array_push ( $TempBookingArray, $value->getFirstName () . ' ' . $value->getSurname () );
				array_push ( $TempBookingArray, $value->getMobileNumber () );
				array_push ( $TempBookingArray, $value->getTimeBooked ()->format ( 'Y-m-d H:i' ) );
				array_push ( $TempBookingArray, $value->getBookingStartTime ()->format ( 'Y-m-d H:i' ) );
				array_push ( $TempBookingArray, $value->getLatestBookingStatus () );
				
				array_push ( $activeBookingsArray, $TempBookingArray );
			}
			
			$response ['status'] = 1;
			$response ['bookings'] = $activeBookingsArray;
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
function getBookingRegionServiceByBooking($entityManager, $booking) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	try {
		
		$bookingServiceRegion = $entityManager->getRepository ( 'BookingServiceRegion' )->findBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
		$bookingServiceRegionArray = array ();
		
		foreach ( $bookingServiceRegion as $value ) {
			array_push ( $bookingServiceRegionArray, $value );
		}
		
		return $bookingServiceRegionArray;
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
	}
	
	return NULL;
}
function changeBookingRegionServiceStatus($entityManager, $bookingRegionServiceStatus, $newBoolStatus) {
	try {
		
		$bookingRegionServiceStatus->setActive ( $newBoolStatus );
		
		$entityManager->persist ( $bookingRegionServiceStatus );
		$entityManager->flush ();
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
	}
}
/* comments can be null, rating can be null - cant remember why these two were part of this table */
function addBookingRegionServiceRegionService($entityManager, $regionServicePriceDTO, $bookingObject, $comments, $rating, $serviceType) {
	try {
		$bookingServiceRegion = regionServiceDTOtoBookingServiceRegionService ( $regionServicePriceDTO, $bookingObject, $comments, $rating, $serviceType );
		
		$entityManager->persist ( $bookingServiceRegion );
		$entityManager->flush ();
		
		return $bookingServiceRegion;
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
	}
	
	return NULL;
}
function regionServiceDTOtoBookingServiceRegionService($regionServicePriceDTO, $bookingObject, $comments, $rating, $serviceType) {
	$bookingServiceRegion = new BookingServiceRegion ();
	
	$bookingServiceRegion->setActive ( 1 );
	$bookingServiceRegion->setBooking ( $bookingObject );
	$bookingServiceRegion->setComments ( $comments );
	$bookingServiceRegion->setDiscountPercentage ( $regionServicePriceDTO->getDiscountPercentage () );
	$bookingServiceRegion->setRating ( $rating );
	$bookingServiceRegion->setActualAmountToPay ( $regionServicePriceDTO->getAmountToPay () );
	$bookingServiceRegion->setServiceAmount ( $regionServicePriceDTO->getServiceAmount () );
	$bookingServiceRegion->setDateCreated ( new DateTime () );
	$bookingServiceRegion->setRegionServiceId ( $regionServicePriceDTO->getRegionServiceId () );
	$bookingServiceRegion->setServiceName ( $regionServicePriceDTO->getServiceName () );
	$bookingServiceRegion->setServiceType ( $serviceType->getName () );
	
	return $bookingServiceRegion;
}
function getBookingsByUserId($entityManager, $userObject) {
	$booking_objects = $entityManager->getRepository ( 'Booking' )->findBy ( array (
			'active' => TRUE,
			'user' => $userObject 
	), array (
			'timeBooked' => 'DESC' 
	) );
	$activeBookingsArray = array ();
	
	foreach ( $booking_objects as &$value ) {
		array_push ( $activeBookingsArray, $value );
	}
	$_SESSION ['user_bookings'] = serialize ( $activeBookingsArray );
	
	return $activeBookingsArray;
}
function getBookingsByPartnerId($entityManager, $userObject) {
	$bookingPartner = $entityManager->getRepository ( 'BookingPartner' )->findBy ( array (
			'user' => $userObject,
			'active' => 1 
	) );
	$activeBookingsArray = array ();
	
	foreach ( $bookingPartner as &$value ) {
		$booking_object = $value->getBooking ();
		array_push ( $activeBookingsArray, $booking_object );
	}
	$_SESSION ['user_bookings'] = serialize ( $activeBookingsArray );
	
	return $activeBookingsArray;
}
function updateBookingComments($entityManager) {
	try {
		session_start ();
	} catch ( Exception $e ) {
	}
	
	try {
		$booking = $entityManager->getRepository ( 'Booking' )->findOneBy ( array (
				'bookingId' => $_POST ['updateBookingComments'] 
		) );
		if ($booking) {
			$bookingComments;
			
			if (isset ( $_SESSION ['firstname'] )) {
				$bookingComments = addBookingComments ( $entityManager, $booking, $_POST ['booking_notes'], $_SESSION ['firstname'] );
			} else {
				$BookingSummaryView = $entityManager->getRepository ( 'BookingSummaryView' )->findOneBy ( array (
						'bookingId' => $_POST ['updateBookingComments'] 
				) );
				$bookingComments = addBookingComments ( $entityManager, $booking, $_POST ['booking_notes'], $BookingSummaryView->getFirstName () );
			}
			
			if (! $bookingComments) {
				$response ['status'] = 2;
				$response ['message'] = 'Failed To Add Booking Notes';
				echo json_encode ( $response );
				return;
			} else {
				if (isset ( $_SESSION ['user_role'] )) {
					if (strcasecmp ( $_SESSION ['user_role'], "ADMINISTRATOR" ) == 0) {
						
						// send booking confirmation email to client
						if (send_booking_notes_added_message ( $entityManager, $booking )) {
							$response ['status'] = 1;
							$response ['message'] = 'Successfully Added Booking Notes';
							echo json_encode ( $response );
							return;
						} else {
							$response ['status'] = 2;
							$response ['message'] = 'Failed To Add Booking Note. Email failed to send, please contact aministrator';
							echo json_encode ( $response );
							return;
						}
					}
				}
				
				$response ['status'] = 1;
				$response ['message'] = 'Successfully Added Booking Notes';
				echo json_encode ( $response );
				return;
			}
		}
		
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Add Booking Notes';
		echo json_encode ( $response );
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Add Booking Notes';
		echo json_encode ( $response );
	}
}
function getBookingDetails($entityManager) {
	try {
		$bookingServiceRegionArray = array ();
		$bookingDetailsArray = array ();
		
		$BookingSummaryView = $entityManager->getRepository ( 'BookingSummaryView' )->findOneBy ( array (
				'bookingId' => $_GET ['getBookingDetails'] 
		) );
		
		if (! $BookingSummaryView) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Retrieve Booking Details';
			echo json_encode ( $response );
			return;
		}
		$booking;
		
		if (isset ( $_GET ['admin'] )) {
			$booking = getBookingByID ( $entityManager, $_GET ['getBookingDetails'] );
		} else {
			$booking = getBookingByIDAndUUID ( $entityManager, $_GET ['getBookingDetails'], $_GET ['uuid'] );
		}
		
		if ($booking == null) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed to retrieve booking details for booking ID ' . $_GET ['getBookingDetails'] . ' with uuid ' . $_GET ['uuid'];
			echo json_encode ( $response );
			return;
		}
		
		$bookingComments = getBookingCommentsArrayForBooking ( $entityManager, $booking );
		$BookingAddress = $entityManager->getRepository ( 'Address' )->findOneBy ( array (
				'addressId' => $BookingSummaryView->getAddressId () 
		) );
		
		$bookingDetailsArray ['client_name'] = $BookingSummaryView->getFirstName ();
		$bookingDetailsArray ['client_surname'] = $BookingSummaryView->getSurname ();
		$bookingDetailsArray ['client_email_address'] = $BookingSummaryView->getUserEmailAddress ();
		$bookingDetailsArray ['client_mobile_number'] = $BookingSummaryView->getMobileNumber ();
		
		$bookingDetailsArray ['booking_complex'] = $BookingAddress->getComplexName ();
		$bookingDetailsArray ['booking_address'] = $BookingAddress->getStreetNumber () . ' ' . $BookingAddress->getStreetName () . ', ' . $BookingAddress->getSuburbName () . ', ' . $BookingAddress->getCityName ();
		$bookingDetailsArray ['lat'] = $BookingAddress->getLatitude ();
		$bookingDetailsArray ['lng'] = $BookingAddress->getLongitude ();
		$bookingDetailsArray ['administrative_area_level_1'] = $BookingAddress->getProvinceName ();
		$bookingDetailsArray ['input_street_name'] = $BookingAddress->getStreetNumber ();
		$bookingDetailsArray ['sublocality'] = $BookingAddress->getSuburbName ();
		$bookingDetailsArray ['locality'] = $BookingAddress->getCityName ();
		$bookingDetailsArray ['booking_date'] = $BookingSummaryView->getBookingStartTime ()->format ( 'Y-m-d H:i' );
		$bookingDetailsArray ['booking_notes'] = $bookingComments;
		
		$bookingDetailsArray ['booking_ref'] = $booking->getSourceSystem () . " - " . $booking->getBookingId ();
		
		// booking status
		$bookingStatus = getActiveBookingStatus ( $entityManager, $booking );
		$bookingDetailsArray ['booking_status'] = $bookingStatus->getBookingBookingStatus ()->getName ();
		
		// booking services
		$bookingRegionServices = getBookingRegionServiceByBooking ( $entityManager, $booking );
		
		foreach ( $bookingRegionServices as $bookingRegionService ) {
			$serviceArray = array ();
			array_push ( $serviceArray, $bookingRegionService->getServiceName () );
			array_push ( $serviceArray, $bookingRegionService->getServiceAmount () );
			array_push ( $serviceArray, $bookingRegionService->getServiceType () );
			
			array_push ( $bookingServiceRegionArray, $serviceArray );
		}
		
		$bookingDetailsArray ['booking_services'] = $bookingServiceRegionArray;
		
		// booking Partner
		$BookingPartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		if ($BookingPartner) {
			$bookingDetailsArray ['provider_id'] = $BookingPartner->getUser ()->getUserId ();
			$bookingDetailsArray ['provider_name'] = $BookingPartner->getUser ()->getUserProfile ()->getFirstName () . " " . $BookingPartner->getUser ()->getUserProfile ()->getSurname ();
			$bookingDetailsArray ['provider_tel'] = $BookingPartner->getUser ()->getUserProfile ()->getPhoneNumber ();
		}
		
		print json_encode ( $bookingDetailsArray );
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Retrieve Booking Details';
		echo json_encode ( $response );
	}
}
function cancelBookingForRebook($entityManager) {
	try {
		$bookingDetailsArray = array ();
		
		$BookingSummaryView = $entityManager->getRepository ( 'BookingSummaryView' )->findOneBy ( array (
				'bookingId' => $_GET ['cancelBookingForRebook'] 
		) );
		
		if (! $BookingSummaryView) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Retrieve Booking Details';
			echo json_encode ( $response );
			return;
		}
		
		$booking;
		
		$booking = getBookingByIDAndUUID ( $entityManager, $_GET ['cancelBookingForRebook'], $_GET ['uuid'] );
		
		if ($booking == null) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed to retrieve booking details for booking ID ' . $_GET ['getBookingDetails'] . ' with uuid ' . $_GET ['uuid'];
			echo json_encode ( $response );
			return;
		}
		
		$bookingDetailsArray ['client_name'] = $BookingSummaryView->getFirstName ();
		$bookingDetailsArray ['client_surname'] = $BookingSummaryView->getSurname ();
		$bookingDetailsArray ['client_email_address'] = $BookingSummaryView->getUserEmailAddress ();
		$bookingDetailsArray ['client_mobile_number'] = $BookingSummaryView->getMobileNumber ();
		
		$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_CANCELLED' );
		
		print json_encode ( $bookingDetailsArray );
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Retrieve Booking Details';
		echo json_encode ( $response );
	}
}

// closes the booking Booking_complete
function completeBookingByAdmin($entityManager) {
	try {
		$booking = getBookingByID ( $entityManager, $_POST ['completeBookingByAdmin'] );
		
		if ($booking == null) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed to retrieve booking details for booking ID ' . $_POST ['completeBookingByAdmin'];
			echo json_encode ( $response );
			return;
		}
		
		$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_COMPLETED' );
		
		if ($bookingBookingStatus) {
			
			// send booking confirmation email to client
			if (send_booking_completed_message ( $entityManager, $booking )) {
				$response ['status'] = 1;
				$response ['message'] = 'Your Booking Was Completed Successfully';
				$response ['bookingid'] = $booking->getBookingId ();
				$response ['booking_status'] = $bookingBookingStatus->getBookingBookingStatus ()->getName ();
				echo json_encode ( $response );
			} else {
				$response ['status'] = 1;
				$response ['message'] = 'Your Booking Was Completed Successfully. Confirmation email failed to send, please contact aministrator';
				$response ['bookingid'] = $booking->getBookingId ();
				echo json_encode ( $response );
			}
		} else {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Complete Your Booking';
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Retrieve Booking Details';
		echo json_encode ( $response );
	}
}
function cancelBooking($entityManager) {
	try {
		session_start ();
	} catch ( Exception $e ) {
	}
	
	try {
		$booking;
		if (isset ( $_SESSION ['user_role'] )) {
			if (strcmp ( $_SESSION ['user_role'], 'ADMINISTRATOR' ) == 0) {
				$booking = getBookingByID ( $entityManager, $_POST ['cancelBooking'] );
			} else {
				$booking = getBookingByIDAndUUID ( $entityManager, $_POST ['cancelBooking'], $_POST ['uuid'] );
			}
		} else {
			$booking = getBookingByIDAndUUID ( $entityManager, $_POST ['cancelBooking'], $_POST ['uuid'] );
		}
		
		if ($booking) {
			
			$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_CANCELLED' );
			if ($bookingBookingStatus) {
				
				// send booking confirmation email to client
				if (send_booking_cancellation_message ( $entityManager, $booking )) {
					$response ['status'] = 1;
					$response ['message'] = 'Your Booking Was Cancelled Successfully';
					$response ['bookingid'] = $booking->getBookingId ();
					$response ['booking_status'] = $bookingBookingStatus->getBookingBookingStatus ()->getName ();
					echo json_encode ( $response );
				} else {
					$response ['status'] = 1;
					$response ['message'] = 'Your Booking Was Cancelled Successfully. Confirmation email failed to send, please contact aministrator';
					$response ['bookingid'] = $booking->getBookingId ();
					echo json_encode ( $response );
				}
			} else {
				$response ['status'] = 2;
				$response ['message'] = 'Failed To Cancel Your Booking';
				echo json_encode ( $response );
			}
		} else {
			$response ['status'] = 2;
			$response ['message'] = 'Booking Not Found';
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Cancel Your Booking';
		echo json_encode ( $response );
		echo $e;
	}
}
function acceptBooking($entityManager) {
	try {
		session_start ();
	} catch ( Exception $e ) {
	}
	
	try {
		$booking;
		$booking = getBookingByIDAndUUID ( $entityManager, $_POST ['acceptBooking'], $_POST ['uuid'] );
		
		if ($booking) {
			
			$bookingBookingStatus = changeBookingStatus ( $entityManager, $booking, 'BOOKING_ACTIVE' );
			if ($bookingBookingStatus) {
				
				// send booking confirmation email to client
				if (send_booking_accepted_message ( $entityManager, $booking )) {
					$response ['status'] = 1;
					$response ['message'] = 'Your Booking Was Accepted Successfully';
					$response ['bookingid'] = $booking->getBookingId ();
					$response ['booking_status'] = $bookingBookingStatus->getBookingBookingStatus ()->getName ();
					echo json_encode ( $response );
				} else {
					$response ['status'] = 1;
					$response ['message'] = 'Your Booking Was Accepted Successfully. Confirmation email failed to send, please contact aministrator';
					$response ['bookingid'] = $booking->getBookingId ();
					echo json_encode ( $response );
				}
			} else {
				$response ['status'] = 2;
				$response ['message'] = 'Failed To Accept Your Booking';
				echo json_encode ( $response );
			}
		} else {
			$response ['status'] = 2;
			$response ['message'] = 'Booking Not Found';
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = 'Failed To Accepted Your Booking';
		echo json_encode ( $response );
		echo $e;
	}
}
function completeBooking($entityManager) {
	try {
		
		$complex = $_POST ['complex'];
		$latitude = $_POST ['lat'];
		$longitude = $_POST ['lng'];
		$province = $_POST ['administrative_area_level_1'];
		$street_name = $_POST ['route'];
		$street_number = $_POST ['street_number'];
		$suburb = $_POST ['sublocality'];
		$city = $_POST ['locality'];
		
		$_SESSION ['booking_user'] = $_POST ['firstname'];
		
		$date = new DateTime ();
		
		$Address = new Address ();
		
		$entityManager->flush ();
		
		if (isset ( $_SESSION ['user_id'] )) {
			$user_object = $entityManager->getRepository ( 'User' )->findOneBy ( array (
					'active' => TRUE,
					'userId' => $_SESSION ['user_id'] 
			) );
			if ($user_object) {
				$user_object = $entityManager->getRepository ( 'User' )->findOneBy ( array (
						'active' => TRUE,
						'userId' => $_SESSION ['user_id'] 
				) );
				$booking = createMasterBooking ( $entityManager, $user_object );
			}
		} else {
			$booking = createMasterBookingNoUser ( $entityManager );
		}
		
		if (! $booking) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Submit Your Booking';
			echo json_encode ( $response );
			return;
		}
		
		$booking_user_profile = new BookingUserProfile ();
		$booking_user_profile->setEmailAddress ( $_POST ['email'] );
		$booking_user_profile->setFirstName ( $_POST ['firstname'] );
		$booking_user_profile->setPhoneNumber ( $_POST ['mobile_number'] );
		$booking_user_profile->setSurname ( $_POST ['surname'] );
		$booking_user_profile->setDateCreated ( $date );
		$booking_user_profile->setBooking ( $booking );
		
		$entityManager->persist ( $booking_user_profile );
		$entityManager->flush ();
		
		$bookingBookingStatus = createBookingBookingStatus ( $entityManager, $booking, 'BOOKING_AWAITING_PARTNER_CONFIRMATION' );
		
		if (! $bookingBookingStatus) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Submit Your Booking';
			echo json_encode ( $response );
			return;
		}
		
		// set booking address to partners address if appointment is at service provider offices
		if (isset ( $_POST ['preferredlocation'] )) {
			if (strcmp ( $_POST ['preferredlocation'], 'walk_in' ) == 0) {
				$user = $entityManager->getRepository ( 'User' )->findOneBy ( array (
						'userId' => $_GET ['partner_id'] 
				) );
				
				if ($user) {
					$Address = $user->getUserProfile ()->getAddress ();
				}
			}
		} else {
			// use address on the form
			$Address->setStreetName ( $street_name );
			$Address->setStreetNumber ( $street_number );
			$Address->setCityName ( $city );
			$Address->setSuburbName ( $suburb );
			$Address->setProvinceName ( $province );
			$Address->setLatitude ( $latitude );
			$Address->setLongitude ( $longitude );
			$Address->setComplexName ( $complex );
			$Address->setDateAdded ( $date );
			
			$entityManager->persist ( $Address );
		}
		
		$bookingAddress = createBookingAddress ( $entityManager, $booking, $Address );
		if (! $bookingAddress) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Submit Your Booking';
			echo json_encode ( $response );
			return;
		}
		
		$format = 'Y/m/d H:i';
		$dateStartTime = DateTime::createFromFormat ( $format, $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] );
		$dateEndTime = DateTime::createFromFormat ( $format, $_POST ['booking_date'] . ' ' . $_POST ['booking_time'] );
		
		$dateEndTime->add ( new DateInterval ( 'PT3H' ) );
		$newBookingTime = changeBookingTime ( $entityManager, $booking, $dateStartTime, $dateEndTime );
		
		if (! $newBookingTime) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Submit Your Booking';
			
			echo json_encode ( $response );
			return;
		}
		
		$BookingSummary = createOrUpdateBookingSummary ( $entityManager, $booking, $newBookingTime, $Address, $_POST ['email'], $_POST ['mobile_number'], 'BOOKING_ACTIVE', $booking_user_profile );
		
		if (! $BookingSummary) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Submit Your Booking';
			echo json_encode ( $response );
			return;
		}
		
		if (strlen ( $_POST ['bookingNotes'] ) > 0) {
			$bookingComments = addBookingComments ( $entityManager, $booking, $_POST ['bookingNotes'], $_POST ['firstname'] );
			
			if (! $bookingComments) {
				$response ['status'] = 2;
				$response ['message'] = 'Failed To Submit Your Booking';
				echo json_encode ( $response );
				return;
			}
		}
		
		$bookingPartner = addBookingPartner ( $entityManager, $booking, $_GET ['partner_id'] );
		
		if (! $bookingPartner) {
			$response ['status'] = 2;
			$response ['message'] = 'Failed To Submit Your Booking';
			echo json_encode ( $response );
			return;
		}
		
		// write all services to the booking_service_region table
		writeServicesToDB ( $entityManager, $booking );
		
		// update user booking in the session for the calendar view
		if (isset ( $_SESSION ['user_id'] )) {
			$user_object = $entityManager->getRepository ( 'User' )->findOneBy ( array (
					'active' => TRUE,
					'userId' => $_SESSION ['user_id'] 
			) );
			if ($user_object) {
				$user_bookings = getBookingsByUserId ( $entityManager, $user_object );
			}
		}
		
		// send booking confirmation email to client
		if (send_booking_confirmation_message ( $entityManager, $booking )) {
			
			if (send_booking_confirmation_to_partner_message ( $entityManager, $booking )) {
				$response ['status'] = 1;
				$response ['message'] = 'Your Booking Was Successful';
				$response ['bookingid'] = $booking->getBookingId ();
				$response ['uuid'] = $booking->getBookingGuid ();
				echo json_encode ( $response );
			} else {
				$response ['status'] = 1;
				$response ['message'] = 'Your Booking Was Successful. Service provider confirmation email failed to send, please contact aministrator';
				$response ['bookingid'] = $booking->getBookingId ();
				echo json_encode ( $response );
			}
		} else {
			$response ['status'] = 2;
			$response ['message'] = 'Your Booking Was Successful. Client confirmation email failed to send, please contact aministrator';
			$response ['bookingid'] = $booking->getBookingId ();
			echo json_encode ( $response );
		}
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = $e->getMessage ();
		echo json_encode ( $response );
	}
}
function writeServicesToDB($entityManager, $bookingObject) {
	try {
		
		$bookingServices = json_decode ( $_GET ['completeBooking'] );
		
		foreach ( $bookingServices as $bookingServiceArray ) {
			
			$LuRegion = $entityManager->getRepository ( 'LuRegion' )->findOneBy ( array (
					'active' => TRUE,
					'name' => $_POST ['administrative_area_level_1'] 
			) );
			
			$LuService = $entityManager->getRepository ( 'LuService' )->findOneBy ( array (
					'active' => TRUE,
					'name' => $bookingServiceArray [0] 
			) );
			
			// echo $LuService->getServiceTypeName();
			
			if ($LuRegion && $LuService) {
				$RegionService = $entityManager->getRepository ( 'RegionService' )->findOneBy ( array (
						'active' => TRUE,
						'service' => $LuService,
						'region' => $LuRegion 
				) );
				if ($RegionService) {
					$regionServicePrice = $entityManager->getRepository ( 'RegionServicePrice' )->findOneBy ( array (
							'active' => TRUE,
							'regionService' => $RegionService 
					) );
					if ($regionServicePrice) {
						$regionServicePriceDTO = new RegionServicePriceDTO ();
						
						$regionServicePriceDTO->setDiscountPercentage ( $regionServicePrice->getDiscountPercentage () );
						$regionServicePriceDTO->setServiceAmount ( $regionServicePrice->getAmount () );
						
						$regionServicePriceDTO->setRegion ( $RegionService->getRegion ()->getName () );
						$regionServicePriceDTO->setServiceName ( $RegionService->getService ()->getName () );
						
						$regionServicePriceDTO->setRegionServiceId ( $RegionService->getRegionServiceId () );
						$regionServicePriceDTO->setRegionServicePriceId ( $regionServicePrice->getRegionServicePriceId () );
						
						addBookingRegionServiceRegionService ( $entityManager, $regionServicePriceDTO, $bookingObject, null, null, $LuService->getServiceTypeName () );
					}
				} else {
					$response ['status'] = 2;
					$response ['message'] = "Region Service Not Found";
					
					echo $e->getTraceAsString ();
					echo json_encode ( $response );
					return;
				}
			} else {
				$response ['status'] = 2;
				$response ['message'] = "Service or region not found";
				echo $e->getTraceAsString ();
				echo json_encode ( $response );
				return;
			}
		}
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = $e->getMessage ();
		echo $e->getTraceAsString ();
		echo json_encode ( $response );
	}
}

/*
 * No error checking yet, I am yet to learn. I will put more controlls later.
 *
 * I will also add logging later.
 *
 */
function getServicePrices($entityManager) {
	try {
		$selectedServicesArray = json_decode ( stripslashes ( $_GET ['services'] ) );
		
		// Loads Regions to session // This should be done at the view but anyway
		loadRegionsToSession ( $entityManager );
		// (Array) Loads all the regions together with its prices check DTO/RegionServicePriceDTO
		$servicePriceArray = loadRegionServicePrices ( $entityManager );
		
		loadFeesToSession ( $entityManager );
		$_SESSION ['service_prices_array'] = $servicePriceArray;
		
		$ServicesPriceArray = array ();
		foreach ( $selectedServicesArray as &$service ) {
			$priceItemDTO = getServiceDTOfromArray ( $entityManager, $_GET ['region'], $service, $_SESSION ['service_prices_array'] );
			if ($priceItemDTO == null) {
				$response ['status'] = 2;
				$response ['message'] = $service . " price for " . $_GET ['region'] . " is not loaded.";
				echo json_encode ( $response );
				return;
			}
			$TempServicesPriceArray = array ();
			array_push ( $TempServicesPriceArray, $service );
			array_push ( $TempServicesPriceArray, $priceItemDTO->getServiceAmount () );
			array_push ( $ServicesPriceArray, $TempServicesPriceArray );
		}
		
		$response ['status'] = 1;
		$response ['message'] = $ServicesPriceArray;
		echo json_encode ( $response );
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = $e->getMessage ();
		echo json_encode ( $response );
	}
}


function getBookingsInCalender($entityManager) {
	$user_bookings = null;
	$url;
	if (isset ( $_SESSION ['user_bookings'] )) {
		// $user_bookings = unserialize ( $_SESSION ['user_bookings'] );
	}
	
	if ($user_bookings == null) {
		$user_object = $entityManager->getRepository ( 'User' )->findOneBy ( array (
				'active' => TRUE,
				'userId' => $_SESSION ['user_id'] 
		) );
		if ($user_object && strcmp ( $_SESSION ['user_role'], "CLIENT" ) == 0) {
			$user_bookings = getBookingsByUserId ( $entityManager, $user_object );
			$url = "/index.php?bookingdetails=";
		} elseif ($user_object && strcmp ( $_SESSION ['user_role'], "PARTNER" ) == 0) {
			$user_bookings = getBookingsByPartnerId ( $entityManager, $user_object );
			$url = "/index.php?partnerbookingdetails=";
		}
	}
	$bookings_times_array = array ();
	
	foreach ( $user_bookings as &$value ) {
		
		$booking_time = $entityManager->getRepository ( 'BookingTime' )->findOneBy ( array (
				'booking' => $value,
				'active' => TRUE 
		) );
		
		if (! $booking_time) {
			continue;
		}
		
		$bookingRegionServices = getBookingRegionServiceByBooking ( $entityManager, $value );
		if (! $bookingRegionServices) {
			// echo "bookingRegionServices not found for " . $value->getBookingId();
			continue;
		}
		
		$servicesString = "";
		
		foreach ( $bookingRegionServices as $bookingRegionService ) {
			$servicesString .= $bookingRegionService->getServiceName () . ", ";
		}
		
		array_push ( $bookings_times_array, array (
				'id' => $value->getBookingId (),
				'title' => "Booking Ref: " . $value->getSourceSystem () . " - " . $value->getBookingId () . "\n Services: " . substr ( $servicesString, 0, strlen ( $servicesString ) - 2 ),
				'start' => $booking_time->getBookingStartTime ()->format ( 'Y-m-d\TH:i:s' ),
				'end' => $booking_time->getBookingEndTime ()->format ( 'Y-m-d\TH:i:s' ),
				'url' => $url . $value->getBookingId () . "&uuid=" . $value->getBookingGuid (),
				'services' => substr ( $servicesString, 0, strlen ( $servicesString ) - 2 ),
				'booking_ref' => "Booking Ref: " . $value->getSourceSystem () . " - " . $value->getBookingId (),
				'uuid' => $value->getBookingGuid () 
		) );
	}
	echo json_encode ( $bookings_times_array );
}
function getAllUserBookings($entityManager) {
	$user = $_SESSION ['user_object'];
	
	// echo "getAllUserBookings";
	if ($user) {
		
		// echo "user found";
		$user_bookings = $entityManager->getRepository ( 'Booking' )->findBy ( array (
				'user' => $user 
		) );
		$bookings_array = array ();
		
		foreach ( $user_bookings as &$value ) {
			// echo "booking found";
			array_push ( $bookings_array, $value );
		}
		
		$_SESSION ['user_bookings'] = serialize ( $bookings_array );
		
		$response ['status'] = 1;
		$response ['message'] = $bookings_array;
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'NO BOOKINGS FOUND';
	}
}
function getAllUserBookingsFromUserSession($entityManager) {
	$user = $_SESSION ['user'];
	
	if ($user != null) {
		
		$user_bookings = $entityManager->getRepository ( 'Booking' )->findBy ( array (
				'user' => $user 
		) );
		$bookings_array = array ();
		
		foreach ( $user_bookings as &$value ) {
			array_push ( $bookings_array, $value );
		}
		
		$_SESSION ['user_bookings'] = serialize ( $bookings_array );
		
		$response ['status'] = 1;
		$response ['message'] = $bookings_array;
		
		echo json_encode ( $response );
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'NO BOOKINGS FOUND';
	}
}
function getBookingTimeDetails($entityManager) {
	$booking_object = $_SESSION ['selected_booking_object'];
	$booking_time = $entityManager->getRepository ( 'BookingTime' )->findBy ( array (
			'booking' => $booking_object,
			'active' => TRUE 
	) );
	
	if ($booking_time != null) {
		$response ['status'] = 1;
		$response ['message'] = $booking_time;
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'NO TIME SET FOR BOOKING'; // Need to replace with proper errors and exceptions
	}
}
function getBookingFromSessionByID($booking_id) {
	$user_bookings_in_session = unserialize ( $_SESSION ['user_bookings'] );
	$booking = null;
	
	if ($user_bookings_in_session != null) {
		foreach ( $user_bookings_in_session as &$value ) {
			if ($value->getBookingId () == $booking_id) {
				$response ['status'] = 1;
				$response ['message'] = $value;
				saveBookingObjectToSession ( $value ); // We can remove this
				break;
			}
		}
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'BOOKING NOT FOUND';
	}
	
	echo json_encode ( $response );
}
function getBookingFromDBbyID($entityManager) {
	$booking_id = $_SESSION ['selected_booking_id'];
	
	if ($booking_id > 0) {
		$booking = $entityManager->getRepository ( 'Booking' )->findBy ( array (
				'bookingId' => $booking_id 
		) );
		
		if ($booking != null) {
			$response ['status'] = 1;
			$response ['message'] = $booking;
		}
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'BOOKING NOT FOUND';
	}
}
function getBookingByID($entityManager, $bookingId) {
	try {
		
		return $entityManager->getRepository ( 'Booking' )->findOneBy ( array (
				'bookingId' => $bookingId 
		) );
	} catch ( Exception $e ) {
	}
	
	return NULL;
}

// I know
function saveBookingObjectToSession($booking_object) {
	if ($booking_object != null) {
		$_SESSION ['selected_booking_object'] = $booking_object;
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'BOOKING NOT SAVED';
	}
}
function saveBookingItemToSession($booking_id) {
	if ($booking_id != null && $booking_id > 0) {
		$_SESSION ['selected_booking_id'] = $booking_id;
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'BOOKING NOT SAVED';
	}
}
function bookingsInSession() {
	if ($_SESSION ['user_bookings'] != null) {
		$response ['status'] = 1;
		$response ['message'] = 'TRUE';
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'FALSE';
	}
	echo json_encode ( $response );
}
function getBestPartners($entityManager) {
	$lowLatitude = floatval ( $_GET ["lat"] ) - RADIUS;
	$lowLongitude = floatval ( $_GET ["lng"] ) - RADIUS;
	
	$highLatitude = floatval ( $_GET ["lat"] ) + RADIUS;
	$highLongitude = floatval ( $_GET ["lng"] ) + RADIUS;
	
	$selectedServicesArray;
	if (isset ( $_GET ['skills_checkbox_item'] )) {
		$selectedServicesArray = $_GET ["skills_checkbox_item"];
	} else if (isset ( $_GET ['skills_array'] )) {
		$selectedServicesArray = json_decode ( $_GET ['skills_array'] );
	}
	
	$dql = "SELECT psp, ps, up, a FROM PartnerServicePrice psp JOIN psp.partnerService ps JOIN ps.partnerProfile up JOIN up.address a JOIN ps.service s
			where 
 	(a.latitude BETWEEN $lowLatitude AND $highLatitude)
	and (a.longitude BETWEEN $lowLongitude AND  $highLongitude)
	and s.name IN (:services)
	ORDER BY up.userProfileId";
	
	// echo $dql;
	$query = $entityManager->createQuery ( $dql )->setParameters ( array (
			'services' => $selectedServicesArray 
	) );
	
	$query->setMaxResults ( 20 );
	$partnerServicePrices = $query->getResult ();
	
	$partnerFound = false;
	$partnerTotalPrice = 0;
	$partnerId = 0;
	$previousPartner;
	$i = 0;
	$bestPartnersArray = array ();
	if ($partnerServicePrices) {
		foreach ( $partnerServicePrices as $partnerServicePrice ) {
			$partner = $entityManager->getRepository ( 'User' )->findOneBy ( array (
					'userProfile' => $partnerServicePrice->getPartnerService ()->getPartnerProfile () 
			) );
			
			if ($partnerId != $partner->getUserId () & $i > 0) {
				$partnerArray = array ();
				array_push ( $partnerArray, $partnerTotalPrice );
				array_push ( $partnerArray, distance ( $_GET ["lat"], $_GET ["lng"], $partner->getUserProfile ()->getAddress ()->getLatitude (), $partner->getUserProfile ()->getAddress ()->getLongitude (), "K" ));
				array_push ( $partnerArray, $previousPartner );
				
				
				array_push ( $bestPartnersArray, $partnerArray );
				$partnerTotalPrice = 0;
			}
			
			$previousPartner = $partner;
			$partnerId = $partner->getUserId ();
			$partnerTotalPrice += $partnerServicePrice->getAmount ();
			
			// check if partner mobility is set
			$userMobility = getPartnerMobility ( $entityManager, $partner->getEmailAddress ());
			if (! $userMobility) {
				break;
			}
			
			$partnerFound = true;
			$i ++;
		}
		
		if ($partnerFound) {
			$partnerArray = array ();
			array_push ( $partnerArray, $partnerTotalPrice );
			array_push ( $partnerArray, distance ( $_GET ["lat"], $_GET ["lng"], $partner->getUserProfile ()->getAddress ()->getLatitude (), $partner->getUserProfile ()->getAddress ()->getLongitude (), "K" ));
			array_push ( $partnerArray, $previousPartner );
			
			array_push ( $bestPartnersArray, $partnerArray );
			
			array_multisort ( $bestPartnersArray, SORT_ASC );
			
			foreach ( $bestPartnersArray as $bestPartnerArray ) {
				$userMobility = getPartnerMobility ( $entityManager, $bestPartnerArray [2]->getEmailAddress () );
				if ($userMobility) {
					outputPartnerToBrowser ( $bestPartnerArray [2], $bestPartnerArray [0],$userMobility, $entityManager );
				}
			}
		} else {
			if (sizeof ( $selectedServicesArray ) > 1) {
				echo 'No partners providing the services requested found near the provided address. Please select fewer services';
			} else {
				echo 'No partners providing the services requested found near the provided address.';
			}
		}
	} else {
		echo 'No partners found near the provided address.';
	}
}
function outputPartnerToBrowser($partner, $partnerTotalPrice, $partnerMobility, $entityManager) {
	
		echo '<div class="partner_preview">';
		echo '<ul class="demo-tags">
  <li><a href="#">' . 'R' . number_format ( $partnerTotalPrice, 2 ) . '</a></li>
</ul>';
		
		$partnerMobility = $partnerMobility->getUserMobility ();
		if (strcmp ( $partnerMobility, 'Both' ) == 0) {
			echo '<div class="container" style="width: 100%;">
			<h5 style="margin-top: 5px;" id="lblpartner' . $partner->getUserId () . '"><b>' . $partner->getUserProfile ()->getFirstName () . ' ' . $partner->getUserProfile ()->getSurname () . ' (Walk-In And Mobile)</b></h5>';
		} elseif (strcmp ( $partnerMobility, 'Mobile' ) == 0) {
			echo '<div class="container" style="width: 100%;">
			<h5 style="margin-top: 5px;" id="lblpartner' . $partner->getUserId () . '"><b>' . $partner->getUserProfile ()->getFirstName () . ' ' . $partner->getUserProfile ()->getSurname () . ' (Mobile Only)</b></h5>';
		} elseif (strcmp ( $partnerMobility, 'Walk-In Only' ) == 0) {
			echo '<div class="container" style="width: 100%;">
			<h5 style="margin-top: 5px;" id="lblpartner' . $partner->getUserId () . '"><b>' . $partner->getUserProfile ()->getFirstName () . ' ' . $partner->getUserProfile ()->getSurname () . ' (Walk-In Only)</b></h5>';
		}
		
		if (isset ( $_SESSION ['user_role'] )) {
			if (strcmp ( $_SESSION ['user_role'], 'ADMINISTRATOR' ) == 0) {
				echo '<h3 style="margin-top: 5px;" id="lblpartner_tel' . $partner->getUserId () . '">' . $partner->getUserProfile ()->getPhoneNumber () . '</h3>';
			}
		}
		
		echo '<p>' . distance ( $_GET ["lat"], $_GET ["lng"], $partner->getUserProfile ()->getAddress ()->getLatitude (), $partner->getUserProfile ()->getAddress ()->getLongitude (), "K" ) . ' KM away. <b>' . $partner->getUserProfile ()->getAddress ()->getSuburbName () . ', ' . $partner->getUserProfile ()->getAddress ()->getCityName () . '</b></p>';
		// echo '<p>' . $partner->getUserProfile ()->getPersonalNote () . '</p>';
		// echo '<input id="partner_rating" class="rating"
		// value="' . $ratingAvg . '" data-min="0" data-max="5" data-disabled="true" data-size="xs">';
		
		if (strcmp ( $partnerMobility, 'Both' ) == 0) {
			echo '<a href="#" class="button selectPartner" name ="' . $partner->getUserProfile ()->getFirstName () . ' ' . $partner->getUserProfile ()->getSurname () . '" id="partner' . $partner->getUserId () . '">Select Mobile</a>';
			echo '<a href="#" class="button selectPartner_walk_in" name ="' . $partner->getUserProfile ()->getFirstName () . ' ' . $partner->getUserProfile ()->getSurname () . '" id="walkin_partner' . $partner->getUserId () . '">Select Walk In</a>';
		} else {
			echo '<a href="#" class="button selectPartner" name ="' . $partner->getUserProfile ()->getFirstName () . ' ' . $partner->getUserProfile ()->getSurname () . '" id="partner' . $partner->getUserId () . '">Select</a>';
		}
		echo '<a href="index.php?aboutpartner=' . $partner->getUserId () . '" target="_blank" class="button">View Gallery</a>';
		echo ' </div>';
		echo '</div>';
	
}
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	// echo $lat1 . ' - ' . $lon1 . ' - ' . $lat2 . ' - ' . $lon2;
	$theta = $lon1 - $lon2;
	$dist = sin ( deg2rad ( $lat1 ) ) * sin ( deg2rad ( $lat2 ) ) + cos ( deg2rad ( $lat1 ) ) * cos ( deg2rad ( $lat2 ) ) * cos ( deg2rad ( $theta ) );
	$dist = acos ( $dist );
	$dist = rad2deg ( $dist );
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper ( $unit );
	
	if (is_nan ( $miles )) {
		return 0;
	} else {
		return round ( $miles * 1.609344, 2 );
	}
}
function getBookingSummary($entityManager, $booking_id) {
	if ($booking_id > 0) {
		$booking_view = $entityManager->getRepository ( 'BookingSummaryView' )->findOneBy ( array (
				'bookingId' => $booking_id 
		) );
		
		if ($booking_view != null) {
			$response ['status'] = 1;
			$response ['message'] = $booking_view;
			
			$_SESSION ['$current_booking_view'] = $booking_view;
		}
		return $booking_view;
	} else {
		$response ['status'] = 2;
		$response ['message'] = 'BOOKING NOT FOUND';
		return NULL;
	}
}
function getBookingSummaryByBooking($entityManager, $booking) {
	try {
		return $entityManager->getRepository ( 'BookingSummaryView' )->findOneBy ( array (
				'bookingId' => $booking->getBookingId () 
		) );
	} catch ( Exception $e ) {
	}
	return NULL;
}
function getBookingAllBookingDetails($entityManager, $booking_id) {
	getBookingByBookingId ( $entityManager, $booking_id );
	$bookingSummaryView = getBookingSummary ( $entityManager, $booking_id );
	
	// Get Address
	$booking_object = $_SESSION ['selected_booking_object'];
	$booking_address = $entityManager->getRepository ( 'BookingAddress' )->findOneBy ( array (
			'booking' => $booking_object,
			'active' => TRUE 
	) );
	$addressArray = addressToString ( $booking_address->getClientAddress () );
	
	$servicesArray = array ();
	
	$bookingDetailsArray ['client_name'] = $bookingSummaryView->getFirstName ();
	$bookingDetailsArray ['client_surname'] = $bookingSummaryView->getSurname ();
	$bookingDetailsArray ['booking_complex'] = $addressArray [0];
	$bookingDetailsArray ['booking_address'] = $addressArray [1];
	$bookingDetailsArray ['booking_date'] = $booking_object->getTimeBooked ();
}
function createOrUpdateBookingSummary($entityManager, $booking, $bookingTime, $address, $emailAdress, $mobileNumber, $bookingStatus, $userProfile) {
	$bookingId = $booking->getBookingId ();
	$addressId = $address->getAddressId ();
	// $userProfile = $booking->getUser();
	
	$bookingView = $entityManager->getRepository ( 'BookingSummaryView' )->findOneBy ( array (
			'active' => TRUE,
			'bookingId' => $bookingId 
	) );
	
	$bookingIsNew = false;
	
	if ($bookingView == null) {
		$bookingView = new BookingSummaryView ();
		$bookingIsNew = true;
	}
	
	$bookingView->setActive ( true );
	
	if (isset ( $_SESSION ['user_id'] )) {
		$bookingView->setUserId ( $_SESSION ['user_id'] );
	}
	
	$firstname = $userProfile->getFirstName ();
	$surname = $userProfile->getSurname ();
	$email = $emailAdress;
	
	$bookingView->setFirstName ( $firstname );
	$bookingView->setSurname ( $surname );
	$bookingView->setUserEmailAddress ( $email );
	$bookingView->setMobileNumber ( $mobileNumber );
	
	$bookingView->setBookingId ( $bookingId );
	$bookingView->setAddressId ( $addressId );
	
	$bookingView->setTimeBooked ( $booking->getTimeBooked () );
	$bookingView->setBookingStartTime ( $bookingTime->getBookingStartTime () );
	$bookingView->setBookingEndTime ( $bookingTime->getBookingEndTime () );
	$bookingView->setLastUpdated ( new DateTime () );
	
	if (! $bookingIsNew)
		$bookingView->setLatestBookingStatus ( $bookingStatus );
	
	$entityManager->persist ( $bookingView );
	$entityManager->flush ();
	
	return $bookingView;
}
function getBookingAddress($entityManager, $booking_object) {
	$booking_address = $entityManager->getRepository ( 'BookingAddress' )->findBy ( array (
			'booking' => $booking_object 
	) );
	return $booking_address;
}
function getBookingByBookingId($entityManager, $bookingId) {
	$booking_object = $entityManager->getRepository ( 'Booking' )->findOneBy ( array (
			'bookingId' => $bookingId 
	) );
	
	if ($booking_object != null) {
		saveBookingObjectToSession ( $booking_object );
	}
}
function addressToString($address) {
	$addressSummaryArray = array ();
	if ($address == NULL) {
		return $addressSummaryArray;
	} else {
		array_push ( $addressSummaryArray, $address->getComplexName () );
		array_push ( $addressSummaryArray, $address->getStreetNumber () . ' , ' . $address->getStreetName () + ' , ' . $address->getCityName () . ' , South Africa' ); //
	}
	return $addressSummaryArray;
}

/**
 *
 * @param
 *        	$entityManager
 * @param
 *        	$booking_user_profile
 * @return Booking|null
 */
function createMasterBooking($entityManager) {
	try {
		
		$booking = new Booking ();
		$user_object = $entityManager->getRepository ( 'User' )->findOneBy ( array (
				'active' => TRUE,
				'userId' => $_SESSION ['user_id'] 
		) );
		$booking->setUser ( $user_object );
		$booking->setTimeBooked ( new DateTime () );
		$booking->setBookingGuid ( uniqid () );
		
		$entityManager->persist ( $booking );
		$entityManager->flush ();
		
		return $booking;
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
		return NULL;
	}
	
	return $booking;
}
function getBookingByIDAndUUID($entityManager, $bookingId, $uuid) {
	try {
		
		return $entityManager->getRepository ( 'Booking' )->findOneBy ( array (
				'bookingId' => $bookingId,
				'bookingGuid' => $uuid 
		) );
	} catch ( Exception $e ) {
	}
	
	return NULL;
}
function getBookingByDate($entityManager, $date) {
	try {
		
		$firstDateTime = new \DateTime ( $date->format ( "Y-m-d" ) . " 00:00:00" );
		$lastDateTime = new \DateTime ( $date->format ( "Y-m-d" ) . " 23:59:59" );
		
		$dql = "SELECT booking FROM Booking booking " . "WHERE booking.active = '1' AND (booking.timeBooked > ?1 AND booking.timeBooked < ?2) ORDER BY booking.bookingId ASC";
		
		$bookingsResultsList = $entityManager->createQuery ( $dql )->setParameter ( 1, $firstDateTime )->setParameter ( 2, $lastDateTime )->setMaxResults ( 100 )->getResult ();
		
		$bookingsArray = array ();
		
		foreach ( $bookingsResultsList as &$value ) {
			array_push ( $bookingsArray, $value );
		}
		
		return $bookingsArray;
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
	}
	
	return NULL;
}
function getBookingByDateAndUser($entityManager, $date, $user) {
	try {
		
		$firstDateTime = new \DateTime ( $date->format ( "Y-m-d" ) . " 00:00:00" );
		$lastDateTime = new \DateTime ( $date->format ( "Y-m-d" ) . " 23:59:59" );
		
		$dql = "SELECT booking FROM Booking booking " . "WHERE booking.active = '1' AND (booking.timeBooked > ?1 AND booking.timeBooked < ?2)" . "AND booking.user = ?3 ORDER BY booking.bookingId ASC";
		
		$bookingsResultsList = $entityManager->createQuery ( $dql )->setParameter ( 1, $firstDateTime )->setParameter ( 2, $lastDateTime )->setParameter ( 3, $user )->setMaxResults ( 100 )->getResult ();
		
		$bookingsArray = array ();
		
		foreach ( $bookingsResultsList as &$value ) {
			array_push ( $bookingsArray, $value );
		}
		
		return $bookingsArray;
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
	}
	
	return NULL;
}
function createMasterBookingNoUser($entityManager) {
	try {
		
		$booking = new Booking ();
		
		$booking->setActive ( 1 );
		$booking->setUserBooked ( $_SESSION ['booking_user'] );
		$booking->setTimeBooked ( new DateTime () );
		$booking->setBookingGuid ( uniqid () );
		
		$entityManager->persist ( $booking );
		$entityManager->flush (); // I'll remove this later
		
		return $booking;
	} catch ( Exception $e ) {
		echo $e->getTraceAsString ();
		return NULL;
	}
}
function createBookingBookingStatus($entityManager, $booking, $status) {
	if ($booking == NULL) {
		echo 'Booking is NULL';
		return NULL;
	}
	
	try {
		$bookingBookingStatus = new BookingBookingStatus ();
		
		$booking_status = $entityManager->getRepository ( 'LuBookingStatus' )->findOneBy ( array (
				'name' => $status 
		) );
		
		if ($booking_status) {
			$bookingBookingStatus->setActive ( 1 );
			$bookingBookingStatus->setBooking ( $booking );
			$bookingBookingStatus->setBookingBookingStatus ( $booking_status );
			$date = new DateTime ();
			$bookingBookingStatus->setTimestamp ( $date );
			
			$entityManager->persist ( $bookingBookingStatus );
			$entityManager->flush (); // I'll remove this later
			
			return $bookingBookingStatus;
		} else {
			echo 'booking_status by ' . $status . ' not found';
		}
	} catch ( Exception $e ) {
		echo 'Could not create Booking Status';
		return NULL;
	}
}
function getActiveBookingStatus($entityManager, $booking) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	try {
		return $entityManager->getRepository ( 'BookingBookingStatus' )->findOneBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
	} catch ( Exception $e ) {
		
		return NULL;
	}
}
function changeBookingStatus($entityManager, $booking, $newStatus) {
	if ($booking == NULL) {
		echo 'no Booking is null';
		return 'FAIL';
	} else {
		
		$currentBookingStatus = getActiveBookingStatus ( $entityManager, $booking );
		
		if ($currentBookingStatus != NULL) {
			
			$currentBookingStatus->setActive ( 0 );
			
			$date = new DateTime ();
			$currentBookingStatus->setTimestamp ( $date );
			
			$entityManager->persist ( $currentBookingStatus );
			$entityManager->flush ();
		}
		// Now add the new status
		$newBookingStatus = createBookingBookingStatus ( $entityManager, $booking, $newStatus );
		
		return $newBookingStatus;
	}
}
function createBookingAddress($entityManager, $booking, $clientBookingAddress) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	
	if ($clientBookingAddress == NULL) {
		echo 'bookingAddress is NULL';
		return NULL;
	}
	
	try {
		
		$bookingAddress = new BookingAddress ();
		$bookingAddress->setActive ( 1 );
		$bookingAddress->setBooking ( $booking );
		$bookingAddress->setClientAddress ( $clientBookingAddress );
		
		$entityManager->persist ( $bookingAddress );
		$entityManager->flush (); // I'll remove this later
		
		return $bookingAddress;
	} catch ( Exception $e ) {
		return NULL;
	}
}
function getActiveBookingAddress($entityManager, $booking) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	try {
		return $entityManager->getRepository ( 'BookingAddress' )->findOneBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
	} catch ( Exception $e ) {
		echo 'Something went wrong';
		return NULL;
	}
}
function changeBookingAddress($entityManager, $booking, $newClientBookingAddress) {
	if ($newClientBookingAddress == NULL) {
		echo 'bookingAddress is NULL'; // There is nothing to change to. Why bother?
		return NULL;
	}
	
	// Check if we have an old booking address
	$activeBookingAddress = getActiveBookingAddress ( $entityManager, $booking );
	
	// If there is no booking address just create a new one.
	if ($activeBookingAddress == NULL) {
		// echo 'creating new booking address';
		return createBookingAddress ( $entityManager, $booking, $newClientBookingAddress );
	} else {
		
		// If there is an existing - deactivate the old one and create a new one.
		$activeBookingAddress->setActive ( 0 );
		$entityManager->persist ( $activeBookingAddress );
		$entityManager->flush ();
		
		// echo 'Changing booking address';
		return createBookingAddress ( $entityManager, $booking, $newClientBookingAddress );
	}
	
	return NULL;
}
function getBookingBookingServices($entityManager, $booking) {
	try {
		
		$bookings_fees_array = array ();
		
		$entityManager->getRepository ( 'BookingServiceRegion' )->findBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
		
		foreach ( $user_bookings as &$value ) {
			array_push ( $bookings_fees_array, $value );
		}
		
		return $bookings_fees_array;
	} catch ( Exception $e ) {
		echo $e->getTrace ();
	}
}
function listBookingServicesAndFees($entityManager, $booking) {
	$booking_services_array = getBookingBookingServices ( $entityManager, $booking );
	$bookings_fees_array = getBookingFees ( $entityManager, $booking );
	
	$booking_summary_fees = array ();
	
	foreach ( $booking_services_array as &$value ) {
		
		$booking_service_name = $value->getRegionService ()->getService ()->getName () . ";" . $value->getRegionService ()->getService ()->array_push ( $booking_summary_fees, $value );
	}
}
function getActiveBookingTime($entityManager, $booking) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	try {
		return $entityManager->getRepository ( 'BookingTime' )->findOneBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
	} catch ( Exception $e ) {
		return NULL;
	}
}
function createNewBookingTime($entityManager, $booking, $bookingStartTime, $bookingEndTime) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	
	try {
		$bookingReference = $booking->getSourceSystem () . " - " . $booking->getBookingId ();
		$bookingTime = new BookingTime ();
		
		$bookingTime->setActive ( 1 );
		$bookingTime->setBooking ( $booking );
		$bookingTime->setBookingStartTime ( $bookingStartTime );
		$bookingTime->setBookingEndTime ( $bookingEndTime );
		// $bookingTime->setBookingReference(uniqid());
		$bookingTime->setBookingReference ( $bookingReference );
		
		$entityManager->persist ( $bookingTime );
		$entityManager->flush ();
		
		// echo 'booking is Active' . $bookingTime->getBookingReference();
		
		return $bookingTime;
	} catch ( Exception $e ) {
		echo 'Failed to create booking time';
		return NULL;
	}
	
	return NULL;
}
function changeBookingTime($entityManager, $booking, $bookingStartTime, $bookingEndTime) {
	$activeBookingTime = getActiveBookingTime ( $entityManager, $booking );
	
	if ($activeBookingTime == NULL) {
		// echo 'creating new BookingTime';
		return createNewBookingTime ( $entityManager, $booking, $bookingStartTime, $bookingEndTime );
	} else {
		// echo 'found existing BookingTime';
		
		$activeBookingTime->setActive ( 0 );
		$entityManager->persist ( $activeBookingTime );
		$entityManager->flush ();
		
		return createNewBookingTime ( $entityManager, $booking, $bookingStartTime, $bookingEndTime );
	}
}
function changeBookingPartner($entityManager, $booking, $user_id) {
	if ($booking == NULL || $user_id == NULL) {
		echo 'booking or user is NULL';
		return NULL;
	}
	
	try {
		
		// booking Partner
		$BookingPartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		if ($BookingPartner) {
			$BookingPartner->setActive ( 0 );
			$entityManager->persist ( $BookingPartner );
			$entityManager->flush ();
		}
		
		return addBookingPartner ( $entityManager, $booking, $user_id );
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
	return NULL;
}
function addBookingPartner($entityManager, $booking, $user_id) {
	if ($booking == NULL || $user_id == NULL) {
		echo 'booking or user is NULL';
		return NULL;
	}
	
	try {
		$user = $entityManager->getRepository ( 'User' )->findOneBy ( array (
				'userId' => $user_id 
		) );
		if ($user) {
			$bookingPartner = new BookingPartner ();
			$bookingPartner->setUser ( $user );
			$bookingPartner->setBooking ( $booking );
			
			$entityManager->persist ( $bookingPartner );
			$entityManager->flush ();
			return $bookingPartner;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
	return NULL;
}

// Max 500, validation will happen at UI level
function addBookingComments($entityManager, $booking, $comments, $addedBy) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	
	try {
		
		$bookingComments = new BookingComments ();
		
		$bookingComments->setBooking ( $booking );
		$bookingComments->setBookingComments ( $comments );
		$bookingComments->setAddedBy ( $addedBy );
		$bookingComments->setDateAdded ( new DateTime () );
		
		$entityManager->persist ( $bookingComments );
		$entityManager->flush ();
		
		return $bookingComments;
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
	return NULL;
}
function getBookingCommentsForBooking($entityManager, $booking) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	
	try {
		return $entityManager->getRepository ( 'BookingComments' )->findOneBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
	} catch ( Exception $e ) {
	}
	return NULL;
}
function getBookingCommentsArrayForBooking($entityManager, $booking) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	
	try {
		$bookingCommentsArrray = $entityManager->getRepository ( 'BookingComments' )->findBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
		
		$activeCommentsArray = array ();
		
		if ($bookingCommentsArrray) {
			foreach ( $bookingCommentsArrray as &$value ) {
				$tempArray = array ();
				array_push ( $tempArray, $value->getBookingComments () );
				array_push ( $tempArray, $value->getDateAdded ()->format ( 'Y-m-d H:i' ) );
				array_push ( $activeCommentsArray, $tempArray );
			}
		}
		
		return $activeCommentsArray;
	} catch ( Exception $e ) {
	}
	return NULL;
}
function updateBookingCommentsStatus($entityManager, $booking, $newComments, $updatedBy) {
	if ($booking == NULL) {
		echo 'booking is NULL';
		return NULL;
	}
	
	try {
		
		$currentBookingComments = getBookingCommentsForBooking ( $entityManager, $booking );
		$currentBookingComments->setActive ( 0 );
		
		$entityManager->persist ( $currentBookingComments );
		$entityManager->flush ();
		
		return addBookingComments ( $entityManager, $booking, $newComments, $updatedBy );
	} catch ( Exception $e ) {
	}
	return NULL;
}
function createBookingService($entityManager, $booking, $regionService, $rating) {
	$bookingServiceRegion = new BookingServiceRegion ();
	
	try {
		
		$bookingServiceRegion->setActive ( 1 );
		$bookingServiceRegion->setBooking ( $booking );
		$bookingServiceRegion->setRegionService ( $regionService );
		
		$entityManager->persist ( $bookingServiceRegion );
		$entityManager->flush ();
		
		return $bookingServiceRegion;
	} catch ( Exception $e ) {
	}
	
	return NULL;
}
function createBookingUserProfile($entityManager, $booking, $phoneNumber, $gender, $surname, $firstName, $emailAddress) {
	try {
		
		$bookingUserProfile = new BookingUserProfile ();
		
		$bookingUserProfile->setBooking ( $booking );
		$bookingUserProfile->setFirstName ( $firstName );
		$bookingUserProfile->setGender ( $gender );
		$bookingUserProfile->setPhoneNumber ( $phoneNumber );
		$bookingUserProfile->setSurname ( $surname );
		$bookingUserProfile->setEmailAddress ( $emailAddress );
		$bookingUserProfile->setDateCreated ( new DateTime () );
		
		$entityManager->persist ( $bookingUserProfile );
		$entityManager->flush ();
		
		return $bookingUserProfile;
	} catch ( Exception $e ) {
		echo $e->getTrace ();
	}
	
	return NULL;
}
function getBookingUserProfile($entityManager, $booking) {
	try {
		return $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
	} catch ( Exception $e ) {
		echo $e->getTrace ();
	}
}
function getBookingAddressByBooking($entityManager, $booking) {
	try {
		return $entityManager->getRepository ( 'BookingAddress' )->findOneBy ( array (
				'booking' => $booking,
				'active' => TRUE 
		) );
	} catch ( Exception $e ) {
		echo $e->getTrace ();
	}
}

// We will deactivate the currentBookingProfile and add a new one
function updateBookingUserProfile($entityManager, $currentBookingUserProfile, $phoneNumber, $gender, $surname, $firstName, $emailAddress) {
	$newBookingUserProfile = NULL;
	try {
		
		$updateResults = changeBookingUserProfileStatus ( $entityManager, $currentBookingUserProfile, FALSE );
		
		if ('SUCCESS' == $updateResults) {
			$newBookingUserProfile = createBookingUserProfile ( $entityManager, $currentBookingUserProfile->getBooking (), $phoneNumber, $gender, $surname, $firstName, $emailAddress );
		}
	} catch ( Exception $e ) {
		echo $e->getTrace ();
	}
	
	return $newBookingUserProfile;
}
function changeBookingUserProfileStatus($entityManager, $currentBookingUserProfile, $newStatus) {
	try {
		
		$currentBookingUserProfile->setActive ( $newStatus );
		
		$entityManager->persist ( $currentBookingUserProfile );
		$entityManager->flush ();
	} catch ( Exception $e ) {
		echo $e->getTrace ();
		return 'FAIL';
	}
	
	return 'SUCCESS';
}
function send_booking_confirmation_to_partner_message($entityManager, $booking) {
	try {
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		$bookingAddress = getBookingAddressByBooking ( $entityManager, $booking );
		$bookingSummary = getBookingSummaryByBooking ( $entityManager, $booking );
		
		$name = $bookingpartner->getUser ()->getUserProfile ()->getFirstName ();
		$surname = $bookingpartner->getUser ()->getUserProfile ()->getSurname ();
		$email = $bookingpartnerEmailAddress;
		$phone_number = $bookingSummary->getMobileNumber ();
		$message_type = "booking_confirmation_partner";
		$message = "test";
		$serviceRows = "";
		
		$personalDetails = $bookingSummary->getFirstName () . " " . $bookingSummary->getSurname () . "<br/>" . $bookingSummary->getUserEmailAddress () . "<br/>" . $bookingSummary->getMobileNumber () . "<br/>
		<h5>APPOINTMENT ADDRESS</h5>" . "<p>" . $bookingAddress->getClientAddress ()->getComplexName () . "<br/>" . $bookingAddress->getClientAddress ()->getStreetNumber () . ' ' . $bookingAddress->getClientAddress ()->getStreetName () . "<br/>" . $bookingAddress->getClientAddress ()->getSuburbName () . "<br/>" . $bookingAddress->getClientAddress ()->getCityName ();
		
		// get services and prices
		$bookingServiceRegions = $entityManager->getRepository ( 'BookingServiceRegion' )->findBy ( array (
				'booking' => $booking 
		) );
		$total = 0;
		if ($bookingServiceRegions) {
			
			foreach ( $bookingServiceRegions as &$value ) {
				$serviceRows .= '<tr class="serviceRow"><td>' . $value->getServiceType () . ' - ' . $value->getServiceName () . '</td><td>R' . number_format ( $value->getActualAmountToPay (), 2 ) . '</td></tr>';
				$total = $total + $value->getActualAmountToPay ();
			}
			
			$serviceRows .= '<tr class="serviceRow"><td></td><td>Total: R' . number_format ( $total, 2 ) . '</td></tr>';
		}
		
		$bookingComments = getBookingCommentsArrayForBooking ( $entityManager, $booking );
		$bookingCommentString = '';
		foreach ( $bookingComments as &$value ) {
			$bookingCommentString = $bookingCommentString . $value [0] . '<br>';
		}
		
		$Parameters = array (
				"first_name" => $name,
				"last_name" => $surname,
				
				"personal_details" => $personalDetails,
				"provider_name" => $bookingpartner->getUser ()->getUserProfile ()->getFirstName () . ' ' . $bookingpartner->getUser ()->getUserProfile ()->getSurname (),
				"booking_notes" => $bookingCommentString,
				"appointment_date" => $bookingSummary->getBookingStartTime ()->format ( 'Y-m-d H:i:s' ),
				"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
				"booking_status" => 'Active',
				"tr_service_price" => $serviceRows,
				"uuid" => $booking->getBookingGuid (),
				"booking_id" => $booking->getBookingId () 
		);
		
		if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - New Booking", $bookingpartnerEmailAddress, "" )) {
			return true;
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e;
		return false;
	}
}
function send_booking_confirmation_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$bookingAddress = getBookingAddressByBooking ( $entityManager, $booking );
		$bookingSummary = getBookingSummaryByBooking ( $entityManager, $booking );
		
		$email = $bookingpartnerEmailAddress;
		$phone_number = $bookingSummary->getMobileNumber ();
		$message_type = "booking_confirmation";
		$message = "test";
		$serviceRows = "";
		
		$personalDetails = $bookingSummary->getFirstName () . " " . $bookingSummary->getSurname () . "<br/>" . $bookingSummary->getUserEmailAddress () . "<br/>" . $bookingSummary->getMobileNumber () . "<br/>
		<h5>APPOINTMENT ADDRESS</h5>" . "<p>" . $bookingAddress->getClientAddress ()->getComplexName () . "<br/>" . $bookingAddress->getClientAddress ()->getStreetNumber () . ' ' . $bookingAddress->getClientAddress ()->getStreetName () . "<br/>" . $bookingAddress->getClientAddress ()->getSuburbName () . "<br/>" . $bookingAddress->getClientAddress ()->getCityName ();
		
		// get services and prices
		$bookingServiceRegions = $entityManager->getRepository ( 'BookingServiceRegion' )->findBy ( array (
				'booking' => $booking 
		) );
		
		$total = 0;
		if ($bookingServiceRegions) {
			
			foreach ( $bookingServiceRegions as &$value ) {
				$serviceRows .= '<tr class="serviceRow"><td>' . $value->getServiceType () . ' - ' . $value->getServiceName () . '</td><td>R' . number_format ( $value->getActualAmountToPay (), 2 ) . '</td></tr>';
				$total .= $value->getActualAmountToPay ();
			}
			
			$serviceRows .= '<tr class="serviceRow"><td></td><td>Total: R' . number_format ( $total, 2 ) . '</td></tr>';
		}
		
		$bookingComments = getBookingCommentsArrayForBooking ( $entityManager, $booking );
		$bookingCommentString = '';
		foreach ( $bookingComments as &$value ) {
			$bookingCommentString = $bookingCommentString . $value [0] . '<br>';
		}
		
		$Parameters = array (
				"first_name" => $bookingSummary->getFirstName (),
				"last_name" => $bookingSummary->getSurname (),
				"mobile_number" => $phone_number,
				"personal_details" => $personalDetails,
				"provider_name" => $bookingpartner->getUser ()->getUserProfile ()->getFirstName () . ' ' . $bookingpartner->getUser ()->getUserProfile ()->getSurname (),
				"booking_notes" => $bookingCommentString,
				"appointment_date" => $bookingSummary->getBookingStartTime ()->format ( 'Y-m-d H:i:s' ),
				"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
				"booking_status" => 'Active',
				"tr_service_price" => $serviceRows,
				"uuid" => $booking->getBookingGuid (),
				"booking_id" => $booking->getBookingId () 
		);
		
		if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Confirmation", $bookingSummary->getUserEmailAddress (), "" )) {
			return true;
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e;
		return false;
	}
}

// send email to user for password with link/url
function emailMessage($entityManager, $Parameters, $messageType, $emailSubject, $toEmailAddress, $bookingpartnerEmailAddress) {
	try {
		
		$body = generate_email_body ( $messageType, $Parameters );
		
		$body = wordwrap ( $body, 70 );
		
		// echo $body;
		
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . SYSTEM_EMAIL_ADDRESS . "\r\n";
		$headers .= 'Reply-To: ' . SYSTEM_EMAIL_ADDRESS . "\r\n";
		$headers .= 'Bcc: ' . NOTIFICATION_EMAIL_GROUP . "\r\n";
		
		$headers .= 'X-Mailer: PHP/' . phpversion () . "\r\n";
		
		if (mail ( $toEmailAddress, $emailSubject, $body, $headers )) {
			return true;
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_cancellation_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			$message_type = "booking_cancellation";
			
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Cancellation", $BookingUserProfile->getEmailAddress (), $bookingpartnerEmailAddress )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_accepted_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			$message_type = "booking_accepted";
			
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId (),
					"uuid" => $booking->getBookingGuid () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Accepted", $BookingUserProfile->getEmailAddress (), "" )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_completed_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			$message_type = "booking_completed";
			
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Completed", $BookingUserProfile->getEmailAddress (), $bookingpartnerEmailAddress )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_notes_added_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			
			$message_type = "booking_comments_added";
			
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId (),
					"booking_note" => $_POST ['booking_notes'],
					"uuid" => $booking->getBookingGuid () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Notes Added", $BookingUserProfile->getEmailAddress (), $bookingpartnerEmailAddress )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_date_changed_message($entityManager, $booking, $date_change_note) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			
			$message_type = "booking_date_change";
			
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId (),
					"date_change_note" => $date_change_note,
					"booking_note" => $_POST ['newBookingTimeReason'],
					"uuid" => $booking->getBookingGuid () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Date Changed", $BookingUserProfile->getEmailAddress (), $bookingpartnerEmailAddress )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_partner_changed_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			
			$message_type = "booking_partner_change";
			
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId (),
					"uuid" => $booking->getBookingGuid (),
					"partner_id" => $bookingpartner->getUser ()->getUserId (),
					"partner_name" => $bookingpartner->getUser ()->getUserProfile ()->getFirstName () . ' ' . $bookingpartner->getUser ()->getUserProfile ()->getSurname () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Service Provider Changed", $BookingUserProfile->getEmailAddress (), $bookingpartnerEmailAddress )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function send_booking_date_partner_changed_message($entityManager, $booking) {
	try {
		
		$bookingpartner = $entityManager->getRepository ( 'BookingPartner' )->findOneBy ( array (
				'booking' => $booking,
				'active' => 1 
		) );
		
		$bookingpartnerEmailAddress = $bookingpartner->getUser ()->getEmailAddress ();
		
		$BookingUserProfile = $entityManager->getRepository ( 'BookingUserProfile' )->findOneBy ( array (
				'booking' => $booking 
		) );
		if ($BookingUserProfile) {
			
			$message_type = "booking_partner_date_change";
			$Parameters = array (
					"first_name" => $BookingUserProfile->getFirstName (),
					"last_name" => $BookingUserProfile->getSurname (),
					"booking_reference" => $booking->getSourceSystem () . " - " . $booking->getBookingId (),
					"booking_id" => $booking->getBookingId (),
					"uuid" => $booking->getBookingGuid (),
					"partner_id" => $bookingpartner->getUser ()->getUserId (),
					"booking_time" => $_POST ['booking_time'],
					"booking_date" => $_POST ['booking_date'],
					"partner_name" => $bookingpartner->getUser ()->getUserProfile ()->getFirstName () . ' ' . $bookingpartner->getUser ()->getUserProfile ()->getSurname () 
			);
			
			if (emailMessage ( $entityManager, $Parameters, $message_type, "MobileOps - Booking Service Provider Changed", $BookingUserProfile->getEmailAddress (), $bookingpartnerEmailAddress )) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		return false;
	}
}
function resendEmail($entityManager) {
	try {
		$emailType = $_GET ['resendEmail'];
		
		$booking = getBookingByID ( $entityManager, $_GET ['booking_id'] );
		if ($booking) {
			
			if (strcmp ( $_GET ['resendEmail'], 'client_new_booking' ) == 0) {
				if (send_booking_confirmation_message ( $entityManager, $booking )) {
					$response ['status'] = 1;
					$response ['message'] = 'Booking email sent to client';
					echo json_encode ( $response );
					return;
				}
			} elseif (strcmp ( $_GET ['resendEmail'], 'partner_new_booking' ) == 0) {
				if (send_booking_confirmation_to_partner_message ( $entityManager, $booking )) {
					$response ['status'] = 1;
					$response ['message'] = 'Booking email sent to partner';
					echo json_encode ( $response );
					return;
				}
			}
			
			$response ['status'] = 2;
			$response ['message'] = "Failed to send email";
			echo json_encode ( $response );
			return;
		}
		
		$response ['status'] = 2;
		$response ['message'] = "Failed to send email, booking not found";
		echo json_encode ( $response );
		return;
	} catch ( Exception $e ) {
		$response ['status'] = 2;
		$response ['message'] = $e->getMessage ();
		echo json_encode ( $response );
	}
}
