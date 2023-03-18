<?php

namespace App\Repositories\Interfaces;

use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
use App\Models\Events\EventImage;
interface EventRepositoryInterface
{
    public function createEventEssential($request);

    public function  updateEventEssential($request, $eventId);

    public function getEventMeta($eventId, $metaKey);

    public function addEventMeta($eventId,$metaKey, $metaValue);

    public function deleteEventMeta($eventMetaId);

    public function updateEventMeta($eventId, $metaKey, $metaValue);

    public function getEventDates($eventId);

    public function createEventDate($request,$eventId);

    public function updateEventDate($request,$eventDateId);

    public function getEventImages($eventId);

    public function createEventImages($request,$eventId);

    public function updateEventImages($request,$eventDateId);

    public function getEventSocialSeo($eventId);

    public function createEventSeo($request,$eventId);

    public function updateEventSeo($request,$eventDateId);

    public function getEventRewards($eventId, $rewardId);

    public function createEventRewards($request,$eventId);

    public function createEventRewardPrice($request,$rewardId);

    public function getRewards($eventId);

    public function getCoreRewards($eventId);

    public function getAddonRewards($eventId);

    public function toggleEventRewardIsDependent($rewardId);

    public function updateRewardDependentSku($rewardId, $dependentSku);

    public function toggleReward($rewardId);

    public function editEventRewards($request,$eventId);

    public function storeMultiQuantityDiscount($request,$eventId);
    public function editMultiQuantityDiscount($request,$eventId);

    public function getMultiQuantityDiscount($eventId);

    public function deleteMultiQuantityDiscount( $eventId, $discountId);

    public function sortRewards($request, $eventId);

    public function removePriceRewards($request);

    public function getEventList();

    public function publishEvent($eventId);

    public function hideEvent($eventId);

    public function getRegistrationSetup($eventId);

    public function createRegistrationSetup($request, $eventId);

     public function updateRegistrationSetup($request, $eventId);

     public function getAllCoupons($eventId);

     public function getCoupon($couponId);

     public function storeCoupon($request);

     public function deleteCoupon($eventId, $couponId);

     public function getLandingPage($eventId);

    public function storeLandingPage($eventId, $data);

    public function getEventDataThroughSlug($slug);
      
    public function getEventIdThroughSlug($slug);

    public function getAllTeams($eventId);

    public function validateTeam($data);

    public function createNewTeam( $data);

    public function validateCouponCode( $data);

    public function validateReferralCode( $data);

    public function calculatePrice($data);

    public function getActiveRewards($eventId);

    public function getActiveCoreRewards($eventId);
    
    public function getActiveAddonRewards($eventId);

    public function getCheckoutRewards($data);

    public function processFreeRegistration($data);
}