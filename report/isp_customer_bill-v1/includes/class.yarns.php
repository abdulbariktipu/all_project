﻿<?
class yarn extends report{
	private $_query="";
	private $_dataArray=array();
	// class constructor
	function __construct($jobs,$type){
		parent::__construct($jobs,$type);
		$this->_setQuery();
		$this->_setData();
	}// end class constructor
	
	private function _setQuery(){
		$jobcond=$this->_setJobsString($this->_jobs,'a.job_no');
		$this->_query="select a.job_no,b.id,c.item_number_id,c.country_id,c.color_number_id,c.size_number_id,c.order_quantity ,c.plan_cut_qnty ,d.id as pre_cost_dtls_id,d.fab_nature_id,e.cons,e.requirment,f.id as yarn_id,f.count_id,f.copm_one_id,f.percent_one,f.type_id,f.color,f.cons_ratio,f.cons_qnty,f.avg_cons_qnty,f.rate,f.amount from wo_po_details_master a, wo_po_break_down b,wo_po_color_size_breakdown c,wo_pre_cost_fabric_cost_dtls d,wo_pre_cos_fab_co_avg_con_dtls e,wo_pre_cost_fab_yarn_cost_dtls f where 1=1 ".$jobcond." and a.id=b.job_id and a.id=c.job_id and a.id=d.job_id and a.id=e.job_id and a.id=f.job_id and b.id=c.po_break_down_id and d.id=e.pre_cost_fabric_cost_dtls_id and c.po_break_down_id=e.po_break_down_id and  c.item_number_id= d.item_number_id and c.color_number_id=e.color_number_id and c.size_number_id=e.gmts_sizes and d.id=f.fabric_cost_dtls_id   and e.cons !=0   and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 order by b.id,pre_cost_dtls_id";
	}
	
	public function getQuery(){
		return $this->_query;
	}
	
	private function _setData() {
		$this->_dataArray=sql_select($this->_query);
		return $this;
	}
	
	public function getData() {
		return $this->_dataArray;
	}
	private function _calculateYarnQty($plan_cut_qnty,$costingPerQty,$set_item_ratio,$cons_qnty){
	  //return $reqyarnqnty =($plan_cut_qnty/($costingPerQty*$set_item_ratio))*$cons_qnty;
	  return $reqyarnqnty =($plan_cut_qnty/$set_item_ratio)*($cons_qnty/$costingPerQty);
	}
	
	private function _calculateYarnAmount($reqyarnqnty,$rate){
	 return $yarnamount=$reqyarnqnty*$rate;
	}
	
	private function _setYarnQty($level){
		
		$jobNo='';
		$itemNumberId='';
		$planPutQnty=0;
		$requirment=0;
		$poId='';
		$countryId='';
		$countId='';
		$copmOneId='';
		$percentOne='';
		$color='';
		$typeId='';
		$consRatio=0;
		//$gmtsitemRatioArray=$this->_gmtsitemRatioArray;
		//$costingPerArray=$this->_costingPerQtyArr;
		
		$yarnQty=array();
		
		foreach($this->_dataArray as $row)
		{
			
			$jobNo=$row[csf('job_no')];
			$itemNumberId=$row[csf('item_number_id')];
			$planPutQnty=$row[csf('plan_cut_qnty')];
			$requirment=$row[csf('requirment')];
			$poId=$row[csf('id')];
			$countryId=$row[csf('country_id')];
			$countId=$row[csf('count_id')];
			$copmOneId=$row[csf('copm_one_id')];
			$percentOne=$row[csf('percent_one')];
			$color=$row[csf('color')];
			$typeId=$row[csf('type_id')];
			$consRatio=$row[csf('cons_ratio')];
			
			//$consQnty=$row[csf('cons_qnty')];
			$consQnty=$requirment*$consRatio/100;
			
			//$costingPerQty=$this->_costingPer($costingPerArray[$jobNo]);
			//$set_item_ratio=$gmtsitemRatioArray[$jobNo][$itemNumberId];
			//$costingPerQty=$this->_costingPer($this->_costingPerQtyArr[$jobNo]);
			$costingPerQty=$this->_costingPerQtyArr[$jobNo];
			$set_item_ratio=$this->_gmtsitemRatioArray[$jobNo][$itemNumberId];
			$reqyarnqnty =$this->_calculateYarnQty($planPutQnty,$costingPerQty,$set_item_ratio,$consQnty);
			if($level=='job_wise'){
				$yarnQty[$jobNo]+=$reqyarnqnty;
			}
			elseif($level=='JobCountCompositionColorAndTypeWise'){
				$yarnQty[$jobNo][$countId][$copmOneId][$color][$typeId]+=$reqyarnqnty;
			}
			elseif($level=='JobCountCompositionPercentAndTypeWise'){
				$yarnQty[$jobNo][$countId][$copmOneId][$percentOne][$typeId]+=$reqyarnqnty;
			}
			elseif($level=='order_wise'){
				$yarnQty[$poId]+=$reqyarnqnty;
			}
			elseif($level=='order_and_gmtsItem_wise'){
				$yarnQty[$poId][$itemNumberId]+=$reqyarnqnty;
			}
			elseif($level=='order_and_country_wise'){
				$yarnQty[$poId][$countryId]+=$reqyarnqnty;
			}
			elseif($level=='OrderCountCompositionColorAndTypeWise'){
				$yarnQty[$poId][$countId][$copmOneId][$color][$typeId]+=$reqyarnqnty;
			}
			elseif($level=='OrderCountCompositionPercentAndTypeWise'){
				$yarnQty[$poId][$countId][$copmOneId][$percentOne][$typeId]+=$reqyarnqnty;
			}
			elseif($level=='CountCompositionAndTypeWise'){
				$yarnQty[$countId][$copmOneId][$percentOne][$typeId]+=$reqyarnqnty;
			}
			else{
				return null;
			}
		}
		return $yarnQty;
	}
	
	private function _setYarnAmount($level){
		$jobNo='';
		$itemNumberId='';
		$planPutQnty=0;
		$requirment=0;
		$rate=0;
		$poId='';
		$countryId='';
		$countId='';
		$copmOneId='';
		$percentOne='';
		$color='';
		$typeId='';
		$consRatio=0;
		//$gmtsitemRatioArray=$this->_gmtsitemRatioArray;
		//$costingPerArray=$this->_costingPerQtyArr;
		$yarnamount_arr=array();
		foreach($this->_dataArray as $row)
		{
			$jobNo=$row[csf('job_no')];
			$itemNumberId=$row[csf('item_number_id')];
			$planPutQnty=$row[csf('plan_cut_qnty')];
			$requirment=$row[csf('requirment')];
			$rate=$row[csf("rate")];
			$poId=$row[csf('id')];
			$countryId=$row[csf('country_id')];
			$countId=$row[csf('count_id')];
			$copmOneId=$row[csf('copm_one_id')];
			$percentOne=$row[csf('percent_one')];
			$color=$row[csf('color')];
			$typeId=$row[csf('type_id')];
			$consRatio=$row[csf('cons_ratio')];
			
			//$consQnty=$row[csf('cons_qnty')];
			$consQnty=$requirment*$consRatio/100;
			
			//$costingPerQty=$this->_costingPer($costingPerArray[$jobNo]);
			//$set_item_ratio=$gmtsitemRatioArray[$jobNo][$itemNumberId];
			//$costingPerQty=$this->_costingPer($this->_costingPerQtyArr[$jobNo]);
			$costingPerQty=$this->_costingPerQtyArr[$jobNo];
			$set_item_ratio=$this->_gmtsitemRatioArray[$jobNo][$itemNumberId];
			
			$reqyarnqnty =$this->_calculateYarnQty($planPutQnty,$costingPerQty,$set_item_ratio,$consQnty);
			$yarnamount=$this->_calculateYarnAmount($reqyarnqnty,$rate);
			if($level=='job_wise'){
				$yarnamount_arr[$jobNo]+=$yarnamount;
			}
			elseif($level=='JobCountCompositionColorAndTypeWise'){
				$yarnamount_arr[$jobNo][$countId][$copmOneId][$color][$typeId]+=$yarnamount;
			}
			elseif($level=='JobCountCompositionPercentAndTypeWise'){
				$yarnamount_arr[$jobNo][$countId][$copmOneId][$percentOne][$typeId]+=$yarnamount;
			}
			
			elseif($level=='order_wise'){
				$yarnamount_arr[$poId]+=$yarnamount;
			}
			elseif($level=='order_and_gmtsItem_wise'){
				$yarnamount_arr[$poId][$itemNumberId]+=$yarnamount;
			}
			elseif($level=='order_and_country_wise'){
				$yarnamount_arr[$poId][$countryId]+=$yarnamount;
			}
			elseif($level=='OrderCountCompositionColorAndTypeWise'){
				$yarnamount_arr[$poId][$countId][$copmOneId][$color][$typeId]+=$yarnamount;
			}
			elseif($level=='OrderCountCompositionPercentAndTypeWise'){
				$yarnamount_arr[$poId][$countId][$copmOneId][$percentOne][$typeId]+=$yarnamount;
			}
			
			elseif($level=='CountCompositionAndTypeWise'){
				$yarnamount_arr[$countId][$copmOneId][$percentOne][$typeId]+=$yarnamount;
			}
			else{
				return null;
			}
		}
		return $yarnamount_arr;
	}
	
	private function _setYarnQtyAndAmount($level){
		
		$jobNo='';
		$itemNumberId='';
		$planPutQnty=0;
		$requirment=0;
		$rate=0;
		$poId='';
		$countryId='';
		$countId='';
		$copmOneId='';
		$percentOne='';
		$color='';
		$typeId='';
		$consRatio=0;
		$sizeNumberId='';
		
		//$gmtsitemRatioArray=$this->_gmtsitemRatioArray;
		//$costingPerArray=$this->_costingPerQtyArr;
		$yarnqtyandamount_arr=array();
		foreach($this->_dataArray as $row)
		{
			$jobNo=$row[csf('job_no')];
			$itemNumberId=$row[csf('item_number_id')];
			$planPutQnty=$row[csf('plan_cut_qnty')];
			$requirment=$row[csf('requirment')];
			$rate=$row[csf("rate")];
			$poId=$row[csf('id')];
			$countryId=$row[csf('country_id')];
			$countId=$row[csf('count_id')];
			$copmOneId=$row[csf('copm_one_id')];
			$percentOne=$row[csf('percent_one')];
			$color=$row[csf('color')];
			$typeId=$row[csf('type_id')];
			$consRatio=$row[csf('cons_ratio')];
			$sizeNumberId=$row[csf('size_number_id')];
			
			//$consQnty=$row[csf('cons_qnty')];
			$consQnty=$requirment*$consRatio/100;
			
			//$costingPerQty=$this->_costingPer($costingPerArray[$jobNo]);
			//$set_item_ratio=$gmtsitemRatioArray[$jobNo][$itemNumberId];
			
			$costingPerQty=$this->_costingPerQtyArr[$jobNo];
			$set_item_ratio=$this->_gmtsitemRatioArray[$jobNo][$itemNumberId];
			
			
			$reqyarnqnty =$this->_calculateYarnQty($planPutQnty,$costingPerQty,$set_item_ratio,$consQnty);
			$yarnamount=$this->_calculateYarnAmount($reqyarnqnty,$rate);
			if($level=='job_wise'){
				$yarnqtyandamount_arr[$jobNo]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$jobNo]['amount']+=$yarnamount;
			}
			elseif($level=='JobCountCompositionColorAndTypeWise'){
				$yarnqtyandamount_arr[$jobNo][$countId][$copmOneId][$color][$typeId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$jobNo][$countId][$copmOneId][$color][$typeId]['amount']+=$yarnamount;
			}
			elseif($level=='JobCountCompositionPercentAndTypeWise'){
				$yarnqtyandamount_arr[$jobNo][$countId][$copmOneId][$percentOne][$typeId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$jobNo][$countId][$copmOneId][$percentOne][$typeId]['amount']+=$yarnamount;
			}
			
			elseif($level=='order_wise'){
				$yarnqtyandamount_arr[$poId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$poId]['amount']+=$yarnamount;
			}
			elseif($level=='order_and_gmtsItem_wise'){
				$yarnqtyandamount_arr[$poId][$itemNumberId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$poId][$itemNumberId]['amount']+=$yarnamount;
			}
			elseif($level=='order_and_country_wise'){
				$yarnqtyandamount_arr[$poId][$countryId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$poId][$countryId]['amount']+=$yarnamount;
			}
			elseif($level=='OrderCountCompositionColorAndTypeWise'){
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$color][$typeId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$color][$typeId]['amount']+=$yarnamount;
			}
			elseif($level=='OrderCountCompositionPercentAndTypeWise'){
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$typeId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$typeId]['amount']+=$yarnamount;
			}
			
			elseif($level=='CountCompositionAndTypeWise'){
				$yarnqtyandamount_arr[$countId][$copmOneId][$percentOne][$typeId]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$countId][$copmOneId][$percentOne][$typeId]['amount']+=$yarnamount;
			}
			elseif($level=='OrderCountCompositionColorTypeAndConsumptionWiseDataArray'){
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['qty']+=$reqyarnqnty;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['rate']=$rate;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['amount']+=$yarnamount;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['planPutQnty']+=$planPutQnty;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['fabCons']=$requirment;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['yratio']=$consRatio;
				$yarnqtyandamount_arr[$poId][$countId][$copmOneId][$percentOne][$color][$typeId]["$consQnty"]['gmtsSize'][$sizeNumberId]=$sizeNumberId;
			}
			else{
				return null;
			}
		}
		return $yarnqtyandamount_arr;
	}
	
	public function unsetDataArray(){
		$this->_dataArray=array();
	}
	
	public function getJobWiseYarnQty($jobNo){
		$jobWiseYarnQty=$this->_setYarnQty('job_wise');
		return $jobWiseYarnQty[$jobNo];
	}
	
	public function getJobWiseYarnQtyArray(){
		$jobWiseYarnQty=$this->_setYarnQty('job_wise');
		return $jobWiseYarnQty;
	}
	
	
	public function getJobCountCompositionColorAndTypeWiseYarnQty($jobNo,$count,$composition,$color,$type){
		$jobCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQty('JobCountCompositionColorAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnQty[$jobNo][$count][$composition][$color][$type];
	}
	public function getJobCountCompositionColorAndTypeWiseYarnQtyArray(){
		$jobCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQty('JobCountCompositionColorAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnQty;
	}
	
	public function getJobCountCompositionColorAndTypeWiseYarnAmount($jobNo,$count,$composition,$color,$type){
		$jobCountCompositionColorAndTypeWiseYarnAmount=$this->_setYarnAmount('JobCountCompositionColorAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnAmount[$jobNo][$count][$composition][$color][$type];
	}
	
	public function getJobCountCompositionColorAndTypeWiseYarnAmountArray(){
		$jobCountCompositionColorAndTypeWiseYarnAmount=$this->_setYarnAmount('JobCountCompositionColorAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnAmount;
	}
	public function getJobCountCompositionColorAndTypeWiseYarnQtyAndAmount($jobNo,$count,$composition,$color,$type){
		$jobCountCompositionColorAndTypeYarnQtyAndAount=$this->_setYarnQtyAndAmount('JobCountCompositionColorAndTypeWise');
		return $jobCountCompositionColorAndTypeYarnQtyAndAount[$jobNo][$count][$composition][$color][$type];
		
	}
	
	public function getJobCountCompositionColorAndTypeWiseYarnQtyAndAmountArray(){
		$jobAndGmtsItemWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('JobCountCompositionColorAndTypeWise');
		return $jobAndGmtsItemWiseYarnQtyAndAount;
	}
	
	//======================================================
	public function getJobCountCompositionPercentAndTypeWiseYarnQty($jobNo,$count,$composition,$percentOne,$type){
		$jobCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQty('JobCountCompositionPercentAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnQty[$jobNo][$count][$composition][$percentOne][$type];
	}
	public function getJobCountCompositionPercentAndTypeWiseYarnQtyArray(){
		$jobCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQty('JobCountCompositionPercentAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnQty;
	}
	
	public function getJobCountCompositionPercentAndTypeWiseYarnAmount($jobNo,$count,$composition,$percentOne,$type){
		$jobCountCompositionColorAndTypeWiseYarnAmount=$this->_setYarnAmount('JobCountCompositionPercentAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnAmount[$jobNo][$count][$composition][$percentOne][$type];
	}
	
	public function getJobCountCompositionPercentAndTypeWiseYarnAmountArray(){
		$jobCountCompositionColorAndTypeWiseYarnAmount=$this->_setYarnAmount('JobCountCompositionPercentAndTypeWise');
		return $jobCountCompositionColorAndTypeWiseYarnAmount;
	}
	public function getJobCountCompositionPercentAndTypeWiseYarnQtyAndAmount($jobNo,$count,$composition,$percentOne,$type){
		$jobCountCompositionColorAndTypeYarnQtyAndAount=$this->_setYarnQtyAndAmount('JobCountCompositionPercentAndTypeWise');
		return $jobCountCompositionColorAndTypeYarnQtyAndAount[$jobNo][$count][$composition][$percentOne][$type];
		
	}
	
	public function getJobCountCompositionPercentAndTypeWiseYarnQtyAndAmountArray(){
		$jobAndGmtsItemWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('JobCountCompositionPercentAndTypeWise');
		return $jobAndGmtsItemWiseYarnQtyAndAount;
	}
	
	//=============================================
	
	
	
	public function getJobWiseYarnAmount($jobNo){
		$jobWiseYarnAmount=$this->_setYarnAmount('job_wise');
		return $jobWiseYarnAmount[$jobNo];
	}
	
	public function getJobWiseYarnAmountArray(){
		$jobWiseYarnAmount=$this->_setYarnAmount('job_wise');
		return $jobWiseYarnAmount;
	}
	
	public function getJobWiseYarnQtyAndAmount($jobNo){
		$jobWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('job_wise');
		return $jobWiseYarnQtyAndAount[$jobNo];
		
	}
	
	public function getJobWiseYarnQtyAndAmountArray(){
		$jobWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('job_wise');
		return $jobWiseYarnQtyAndAount;
		
	}
	// order wise
	public function getOrderWiseYarnQty($poId){
		$orderWiseYarnQty=$this->_setYarnQty('order_wise');
		return $orderWiseYarnQty[$poId];
	}
	
	public function getOrderWiseYarnQtyArray(){
		$orderWiseYarnQty=$this->_setYarnQty('order_wise');
		return $orderWiseYarnQty;
	}
	
	public function getOrderWiseYarnAmount($poId){
		$orderWiseYarnAmount=$this->_setYarnAmount('order_wise');
		return $orderWiseYarnAmount[$poId];
	}
	
	public function getOrderWiseYarnAmountArray(){
		$orderWiseYarnAmount=$this->_setYarnAmount('order_wise');
		return $orderWiseYarnAmount;
	}
	public function getOrderWiseYarnQtyAndAmount($poId){
		$orderWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('order_wise');
		return $orderWiseYarnQtyAndAount[$poId];
		
	}
	public function getOrderWiseYarnQtyAndAmountArray(){
		$orderWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('order_wise');
		return $orderWiseYarnQtyAndAount;
		
	}
	// order and Gmts Item wise
	public function getOrderAndGmtsItemWiseYarnQty($poId,$gmtsItem){
		$orderAndGmtsItemWiseYarnQty=$this->_setYarnQty('order_and_gmtsItem_wise');
		return $orderAndGmtsItemWiseYarnQty[$poId][$gmtsItem];
	}
	
	public function getOrderAndGmtsItemWiseYarnQtyArray(){
		$orderAndGmtsItemWiseYarnQty=$this->_setYarnQty('order_and_gmtsItem_wise');
		return $orderAndGmtsItemWiseYarnQty;
	}
	public function getOrderAndGmtsItemWiseYarnAmount($poId,$gmtsItem){
		$orderAndGmtsItemWiseYarnAmount=$this->_setYarnAmount('order_and_gmtsItem_wise');
		return $orderAndGmtsItemWiseYarnAmount[$poId][$gmtsItem];
	}
	
	public function getOrderAndGmtsItemWiseYarnAmountArray(){
		$orderAndGmtsItemWiseYarnAmount=$this->_setYarnAmount('order_and_gmtsItem_wise');
		return $orderAndGmtsItemWiseYarnAmount;
	}
	public function getOrderAndGmtsItemWiseYarnQtyAndAmount($poId,$gmtsItem){
		$orderAndGmtsItemWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('order_and_gmtsItem_wise');
		return $orderAndGmtsItemWiseYarnQtyAndAount[$poId][$gmtsItem];
		
	}
	public function getOrderAndGmtsItemWiseYarnQtyAndAmountArray(){
		$orderAndGmtsItemWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('order_and_gmtsItem_wise');
		return $orderAndGmtsItemWiseYarnQtyAndAount;
		
	}
	
	
	// order and Countrywise
	public function getOrderAndCountryWiseYarnQty($poId,$countryId){
		$orderAndCountryYarnQty=$this->_setYarnQty('order_and_country_wise');
		return $orderAndCountryYarnQty[$poId][$countryId];
	}
	
	public function getOrderAndCountryWiseYarnQtyArray(){
		$orderAndCountryYarnQty=$this->_setYarnQty('order_and_country_wise');
		return $orderAndCountryYarnQty;
	}
	                
	public function getOrderAndCountryWiseYarnAmount($poId,$countryId){
		$orderAndCountryYarnAmount=$this->_setYarnAmount('order_and_country_wise');
		return $orderAndCountryYarnAmount[$poId][$countryId];
	}
	                
	public function getOrderAndCountryWiseYarnAmountArray(){
		$orderAndCountryYarnAmount=$this->_setYarnAmount('order_and_country_wise');
		return $orderAndCountryYarnAmount;
	}
	public function getOrderAndCountryWiseYarnQtyAndAmount($poId,$countryId){
		$orderAndCountryYarnQtyAndAount=$this->_setYarnQtyAndAmount('order_and_country_wise');
		return $orderAndCountryYarnQtyAndAount[$poId][$countryId];
		
	}
	public function getOrderAndCountryWiseYarnQtyAndAmountArray(){
		$orderAndCountryYarnQtyAndAount=$this->_setYarnQtyAndAmount('order_and_country_wise');
		return $orderAndCountryYarnQtyAndAount;
		
	}
	// order,Count,Composition,color,type wise
	public function getOrderCountCompositionColorAndTypeWiseYarnQty($poId,$count,$composition,$color,$type){
		$orderCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQty('OrderCountCompositionColorAndTypeWise');
		return $orderCountCompositionColorAndTypeWiseYarnQty[$poId][$count][$composition][$color][$type];
	}
	
	public function getOrderCountCompositionColorAndTypeWiseYarnQtyArray(){
		$orderCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQty('OrderCountCompositionColorAndTypeWise');
		return $orderCountCompositionColorAndTypeWiseYarnQty;
	}
	public function getOrderCountCompositionColorAndTypeWiseYarnAmount($poId,$count,$composition,$color,$type){
		$orderCountCompositionColorAndTypeWiseYarnAmount=$this->_setYarnAmount('OrderCountCompositionColorAndTypeWise');
		return $orderCountCompositionColorAndTypeWiseYarnAmount[$poId][$count][$composition][$color][$type];
	}
	
	public function getOrderCountCompositionColorAndTypeWiseYarnAmountArray(){
		$orderCountCompositionColorAndTypeWiseYarnAmount=$this->_setYarnAmount('OrderCountCompositionColorAndTypeWise');
		return $orderCountCompositionColorAndTypeWiseYarnAmount;
	}
	public function getOrderCountCompositionColorAndTypeWiseYarnQtyAndAmount($poId,$count,$composition,$color,$type){
		$orderCountCompositionColorAndTypeYarnQtyAndAount=$this->_setYarnQtyAndAmount('OrderCountCompositionColorAndTypeWise');
		return $orderCountCompositionColorAndTypeYarnQtyAndAount[$poId][$count][$composition][$color][$type];
		
	}
	
	public function getOrderCountCompositionColorAndTypeWiseYarnQtyAndAmountArray(){
		$orderAndGmtsItemWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('OrderCountCompositionColorAndTypeWise');
		return $orderAndGmtsItemWiseYarnQtyAndAount;
	}
	
	// order,Count,Composition,type wise
	public function getOrderCountCompositionPercentAndTypeWiseYarnQty($poId,$count,$composition,$percentOne,$type){
		$orderCountCompositionAndTypeWiseYarnQty=$this->_setYarnQty('OrderCountCompositionPercentAndTypeWise');
		return $orderCountCompositionAndTypeWiseYarnQty[$poId][$count][$composition][$percentOne][$type];
	}
	
	public function getOrderCountCompositionPercentAndTypeWiseYarnQtyArray(){
		$orderCountCompositionAndTypeWiseYarnQty=$this->_setYarnQty('OrderCountCompositionPercentAndTypeWise');
		return $orderCountCompositionAndTypeWiseYarnQty;
	}
	public function getOrderCountCompositionPercentAndTypeWiseYarnAmount($poId,$count,$composition,$percentOne,$type){
		$orderCountCompositionAndTypeWiseYarnAmount=$this->_setYarnAmount('OrderCountCompositionPercentAndTypeWise');
		return $orderCountCompositionAndTypeWiseYarnAmount[$poId][$count][$composition][$percentOne][$type];
	}
	
	public function getOrderCountCompositionPercentAndTypeWiseYarnAmountArray(){
		$orderCountCompositionAndTypeWiseYarnAmount=$this->_setYarnAmount('OrderCountCompositionPercentAndTypeWise');
		return $orderCountCompositionAndTypeWiseYarnAmount;
	}
	public function getOrderCountCompositionPercentAndTypeWiseYarnQtyAndAmount($poId,$count,$composition,$percentOne,$type){
		$orderCountCompositionAndTypeYarnQtyAndAount=$this->_setYarnQtyAndAmount('OrderCountCompositionPercentAndTypeWise');
		return $orderCountCompositionAndTypeYarnQtyAndAount[$poId][$count][$composition][$percentOne][$type];
		
	}
	
	public function getOrderCountCompositionPercentAndTypeWiseYarnQtyAndAmountArray(){
		$orderAndGmtsItemWiseYarnQtyAndAount=$this->_setYarnQtyAndAmount('OrderCountCompositionPercentAndTypeWise');
		return $orderAndGmtsItemWiseYarnQtyAndAount;
	}
	
	
	
	
	
	// order,Count,Composition,color,type and comsumption wise Data Array
	public function getOrderCountCompositionColorTypeAndConsumptionWiseYarnDataArray(){
		$orderCountCompositionColorAndTypeWiseYarnQty=$this->_setYarnQtyAndAmount('OrderCountCompositionColorTypeAndConsumptionWiseDataArray');
		return $orderCountCompositionColorAndTypeWiseYarnQty;
	}
	
	
	// count, composition  and type
	public function getCountCompositionAndTypeWiseYarnQty($count,$composition,$type){
		$CountCompositionAndTypeWiseYarnQty=$this->_setYarnQty('CountCompositionAndTypeWise');
		return $CountCompositionAndTypeWiseYarnQty[$count][$composition][$type];
	}
	public function getCountCompositionAndTypeWiseYarnQtyArray(){
		$CountCompositionAndTypeWiseYarnQty=$this->_setYarnQty('CountCompositionAndTypeWise');
		return $CountCompositionAndTypeWiseYarnQty;
	}
	
	public function getCountCompositionAndTypeWiseYarnAmount($count,$composition,$type){
		$CountCompositionAndTypeWiseYarnAmount=$this->_setYarnAmount('CountCompositionAndTypeWise');
		return $CountCompositionAndTypeWiseYarnAmount[$count][$composition][$type];
	}
	
	public function getCountCompositionAndTypeWiseYarnAmountArray(){
		$CountCompositionAndTypeWiseYarnAmount=$this->_setYarnAmount('CountCompositionAndTypeWise');
		return $CountCompositionAndTypeWiseYarnAmount;
	}
	public function getCountCompositionAndTypeWiseYarnQtyAndAmount($count,$composition,$type){
		$CountCompositionAndTypeYarnQtyAndAount=$this->_setYarnQtyAndAmount('CountCompositionAndTypeWise');
		return $CountCompositionAndTypeYarnQtyAndAount[$count][$composition][$type];
		
	}
	public function getCountCompositionAndTypeWiseYarnQtyAndAmountArray(){
		$CountCompositionAndTypeYarnQtyAndAount=$this->_setYarnQtyAndAmount('CountCompositionAndTypeWise');
		return $CountCompositionAndTypeYarnQtyAndAount;
	}
	function __destruct() {
		parent::__destruct();
	}
}



/*$jobs=array('FAL-15-00657','FAL-15-00650','FAL-15-00650');
$jobs=array('5477');
$yarn= new yarn($jobs,'po');

print_r( $yarn->getOrderCountCompositionColorAndTypeWiseYarnQtyArray());
echo "<br/>";
echo $yarn->getOrderWiseYarnQty('5477');*/

//echo $yarn->getQuery();
/*echo "<br/>";
$job='FAL-15-00657';
print_r( $yarn->getOrderAndGmtsItemWiseYarnQtyArray());
echo "<br/>";
print_r( $yarn->getOrderAndGmtsItemWiseYarnAmountArray());
echo "<br/>";
print_r( $yarn->getAndGmtsItemOrderWiseYarnQtyAndAmountArray());
echo "<br/>";
$order='5477';
$item=1;
print_r( $yarn->getOrderAndGmtsItemWiseYarnQty($order,$item));
echo "<br/>";
print_r( $yarn->getOrderAndGmtsItemWiseYarnAmount($order,$item));
echo "<br/>";
print_r( $yarn->getOrderAndGmtsItemWiseYarnQtyAndAmount($order,$item));
echo "<br/>";*/

/*
echo "<br/>";
$job='FAL-15-00657';
print_r( $yarn->getJobWiseYarnQty($job));
echo "<br/>";
echo $yarn->getJobWiseYarnAmount($job);
echo "<br/>";
$order='5477';
echo $yarn->getOrderWiseYarnQty($order);
echo "<br/>";
echo $yarn->getOrderWiseYarnAmount($order);
echo "<br/>";
print_r( $yarn->getOrderWiseYarnQtyArray());
//echo $dd[5545];
echo "<br/>";
print_r( $yarn->getJobWiseYarnQtyAndAmount($job));
echo "<br/>";
print_r( $yarn->getJobWiseYarnQtyAndAmountArray());
echo "<br/>";
print_r( $yarn->getOrderWiseYarnQtyAndAmount($order));
echo "<br/>";
print_r( $yarn->getOrderWiseYarnQtyAndAmountArray());*/
?>
