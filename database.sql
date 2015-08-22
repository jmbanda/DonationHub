--
-- Database: `donationhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
`donor_id` int(11) unsigned NOT NULL,
  `donor_first_name` varchar(350) NOT NULL,
  `donor_last_name` varchar(350) NOT NULL,
  `plan_id` int(11) unsigned NOT NULL,
  `donor_email` varchar(350) NOT NULL,
  `donor_password` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donor_interests`
--

CREATE TABLE `donor_interests` (
`donor_interest_id` int(10) unsigned NOT NULL,
  `donor_id` int(10) unsigned NOT NULL,
  `recipient_type_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
`plan_id` int(10) unsigned NOT NULL,
  `plan_description` varchar(350) NOT NULL,
  `plan_rate_in_days` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
`recipient_id` int(10) unsigned NOT NULL,
  `recipient_description` varchar(350) NOT NULL,
  `recipient_url` varchar(350) NOT NULL,
  `recipient_account` varchar(350) NOT NULL,
  `recipient_email` varchar(350) NOT NULL,
  `recipient_password` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipient_type`
--

CREATE TABLE `recipient_type` (
`recipient_type_id` int(10) unsigned NOT NULL,
  `recipient_type_description` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
`transaction_id` int(10) unsigned NOT NULL,
  `donor_id` int(10) unsigned NOT NULL,
  `recipient_id` int(10) unsigned NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
 ADD PRIMARY KEY (`donor_id`), ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `donor_interests`
--
ALTER TABLE `donor_interests`
 ADD PRIMARY KEY (`donor_interest_id`), ADD KEY `donor_id` (`donor_id`), ADD KEY `recipient_type_id` (`recipient_type_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
 ADD PRIMARY KEY (`plan_id`), ADD KEY `plan_rate_in_days` (`plan_rate_in_days`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
 ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `recipient_type`
--
ALTER TABLE `recipient_type`
 ADD PRIMARY KEY (`recipient_type_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`transaction_id`), ADD KEY `donor_id` (`donor_id`,`recipient_id`), ADD KEY `recipient_id` (`recipient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
MODIFY `donor_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donor_interests`
--
ALTER TABLE `donor_interests`
MODIFY `donor_interest_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
MODIFY `plan_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
MODIFY `recipient_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipient_type`
--
ALTER TABLE `recipient_type`
MODIFY `recipient_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donors`
--
ALTER TABLE `donors`
ADD CONSTRAINT `FK` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donor_interests`
--
ALTER TABLE `donor_interests`
ADD CONSTRAINT `FK_RT` FOREIGN KEY (`recipient_type_id`) REFERENCES `recipient_type` (`recipient_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `FK_RD` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
ADD CONSTRAINT `FX_RM` FOREIGN KEY (`recipient_id`) REFERENCES `recipients` (`recipient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `FX_DM` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
