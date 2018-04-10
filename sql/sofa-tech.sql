CREATE TABLE customers (
);

CREATE TABLE clients (
);

CREATE TABLE jobs (
	jobId int(10) not null primary key auto_increment,
	jobClientId int(10),
	jobReference varchar(100),
	jobDateEntered datetime,
	jobDateCreated datetime,
	jobLastModified datetime,
	jobCreatedBy varchar(100),
	jobDateOpened datetime,
	jobOpenedBy varchar(100),
	jobDateClosed datetime,
	jobCustomerId int(10),
	jobItemOrderDate datetime,
	jobItemDeliveryDate datetime,
	jobItemCombinationId int(10),
	jobItemSupplier varchar(255),
	jobItemType varchar(255),
	jobItemModel varchar(255),
	jobItemColour varchar(100),
	jobItemSampleRequired enum('yes','no') default 'no',
	jobItemCustomerAcceptsRepair enum('yes','no'),
	jobItemPhotosRequired enum('yes','no') default 'no',
	jobItemReplacementRequired enum('yes','no') default 'no',
	jobItemFindingsAndRecommendations text,
	jobItemDescriptionAndDamageCause text,
	jobQuotationPrice float(4,2),
	jobFaultClass varchar(100),
	jobConditionClass varchar(100),
	jobPartsRequried text,
	jobBatchInfo varchar(255),
	jobVisitOutcome varchar(255),
	jobNotes text	
)