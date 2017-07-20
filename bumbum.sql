-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2013 at 02:54 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bumbum`
--

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `userid` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `bizrule` text COLLATE latin1_general_ci,
  `data` text COLLATE latin1_general_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('LocationAdmin', '2', NULL, NULL),
('Normal', '3', NULL, NULL),
('Normal', '4', NULL, NULL),
('SuperAdmin', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE latin1_general_ci,
  `bizrule` text COLLATE latin1_general_ci,
  `data` text COLLATE latin1_general_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('consignment_create', 3, 'create new consignments', NULL, NULL),
('consignment_manage', 2, 'manage consignments', NULL, NULL),
('emails_all_view', 0, 'View all emais.', NULL, 'N;'),
('emails_create', 0, 'Create a secondary email.', NULL, 'N;'),
('emails_delete', 0, 'Delete a secondary email.', NULL, 'N;'),
('emails_manage', 1, 'Manage secondary emails!', NULL, 'N;'),
('emails_verificationLink_resend', 0, 'Resend the verification link.', NULL, 'N;'),
('LocationAdmin', 1, 'Location Managers', NULL, NULL),
('Normal', 3, 'normal user', NULL, NULL),
('password_change', 0, 'With this right user can change the password without knowing the old password.', NULL, 'N;'),
('settings_emails_customization', 0, 'Allow user to customize emais sent by this application.', NULL, 'N;'),
('settings_manage', 1, 'Allow the user to change the default settings.', NULL, 'N;'),
('SuperAdmin', 2, 'The most powerful admin!', NULL, 'N;'),
('users_admin', 0, 'View all users + options.', NULL, 'N;'),
('users_all_privateProfile_view', 0, 'View a user private profile.', NULL, 'N;'),
('users_all_view', 0, 'View all users.', NULL, 'N;'),
('users_create', 0, 'Create a user.', NULL, 'N;'),
('users_delete', 0, 'Delete a user.', NULL, 'N;'),
('users_manage', 1, 'Manage users!', NULL, 'N;'),
('users_myprofile', 3, 'view ur own profile', NULL, NULL),
('users_profile_update', 0, 'Update a user profile.', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `child` varchar(64) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('consignment_manage', 'consignment_create'),
('LocationAdmin', 'consignment_manage'),
('Normal', 'consignment_manage'),
('SuperAdmin', 'consignment_manage'),
('emails_manage', 'emails_all_view'),
('emails_manage', 'emails_create'),
('emails_manage', 'emails_delete'),
('SuperAdmin', 'emails_manage'),
('emails_manage', 'emails_verificationLink_resend'),
('Normal', 'password_change'),
('users_manage', 'password_change'),
('settings_manage', 'settings_emails_customization'),
('SuperAdmin', 'settings_manage'),
('users_manage', 'users_admin'),
('users_manage', 'users_all_privateProfile_view'),
('users_manage', 'users_all_view'),
('users_manage', 'users_create'),
('users_manage', 'users_delete'),
('SuperAdmin', 'users_manage'),
('Normal', 'users_myprofile'),
('LocationAdmin', 'users_profile_update'),
('Normal', 'users_profile_update'),
('users_manage', 'users_profile_update');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE IF NOT EXISTS `centers` (
  `center_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `center_code` varchar(3) NOT NULL,
  `location` varchar(30) NOT NULL,
  PRIMARY KEY (`center_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`center_id`, `center_code`, `location`) VALUES
(1, 'ABI', 'Abia'),
(2, 'ADM', 'Adamawa'),
(3, 'AKW', 'Akwa Ibom'),
(4, 'ANB', 'Anambra'),
(5, 'BAU', 'Bauchi'),
(6, 'BYS', 'Bayelsa'),
(7, 'BNU', 'Benue'),
(8, 'BOR', 'Borno'),
(9, 'CRV', 'Cross River'),
(10, 'DEL', 'Delta'),
(11, 'EBO', 'Ebonyi'),
(12, 'EKT', 'Ekiti'),
(13, 'EDO', 'Edo'),
(14, 'ENU', 'Enugu'),
(15, 'GMB', 'Gombe'),
(16, 'IMO', 'Imo'),
(17, 'JGW', 'Jigawa'),
(18, 'KAD', 'Kaduna'),
(19, 'KAN', 'Kano'),
(20, 'KAT', 'Katsina'),
(21, 'KBI', 'Kebbi'),
(22, 'KGI', 'Kogi'),
(23, 'KWR', 'Kwara'),
(24, 'LAG', 'Lagos'),
(25, 'NSR', 'Nasarawa'),
(26, 'NIG', 'Niger'),
(27, 'OGN', 'Ogun'),
(28, 'OND', 'Ondo'),
(29, 'OSN', 'Osun'),
(30, 'OYO', 'Oyo'),
(31, 'PLT', 'Plateau'),
(32, 'RVS', 'Rivers'),
(33, 'SKT', 'Sokoto'),
(34, 'TRB', 'Taraba'),
(35, 'YOB', 'Yobe'),
(36, 'ZFR', 'Zamfara'),
(37, 'FCT', 'Abuja');

-- --------------------------------------------------------

--
-- Table structure for table `consignments`
--

CREATE TABLE IF NOT EXISTS `consignments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `way_bill_number` varchar(10) NOT NULL,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `type` varchar(20) NOT NULL,
  `origin_code` varchar(20) NOT NULL,
  `destination_code` varchar(20) NOT NULL,
  `packaging` varchar(15) NOT NULL,
  `weight` int(11) NOT NULL,
  `content_description` text NOT NULL,
  `delivery_option` varchar(30) NOT NULL,
  `pod` varchar(15) NOT NULL,
  `pickup_date` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `remark` text NOT NULL,
  `recived_date` datetime NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `consignments`
--

INSERT INTO `consignments` (`id`, `way_bill_number`, `sender_id`, `receiver_id`, `type`, `origin_code`, `destination_code`, `packaging`, `weight`, `content_description`, `delivery_option`, `pod`, `pickup_date`, `status`, `remark`, `recived_date`, `user_id`, `last_update`) VALUES
(1, '1111', 3, 3, 'Domestic', '1', '2', 'Envelope', 1, 'its all good', 'Weekday Delivery', 'Yes', '2013-11-18', 'Pending', 'well', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, '2222', 4, 3, 'Domestic', '2', '3', 'Carton', 2, 'well just a basic test', 'Weekday Delivery', 'Yes', '2013-11-26', 'Pending', 'well lets see', '0000-00-00 00:00:00', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `name` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `date_of_creation` timestamp NULL DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `emails_user_emails_UNIQUE` (`id_user`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `id_user`, `name`, `verified`, `verification_code`, `date_of_creation`, `visible`) VALUES
(1, 1, 'admin@noEmail.com', 0, NULL, '2013-11-06 10:54:54', 0),
(2, 2, 'demo@noEmail.com', 0, NULL, '2013-11-06 10:54:54', 0),
(3, 3, 'olalekanarowoselu@gmail.com', 0, NULL, '2013-11-11 02:46:49', 0),
(4, 4, 'olalekanarowoselu@yahoo.co.uk', 0, NULL, '2013-11-11 02:48:10', 0);

--
-- Triggers `emails`
--
DROP TRIGGER IF EXISTS `trg_emails_bi`;
DELIMITER //
CREATE TRIGGER `trg_emails_bi` BEFORE INSERT ON `emails`
 FOR EACH ROW BEGIN
        SET NEW.date_of_creation = current_timestamp;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `id_user_invited` bigint(20) unsigned DEFAULT NULL,
  `email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `note` text COLLATE latin1_general_ci,
  `invitation_code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `date_of_invitation_send` timestamp NULL DEFAULT NULL,
  `date_of_invitation_accepted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invitations_email_code_UNIQUE` (`email`,`invitation_code`),
  KEY `id_user` (`id_user`),
  KEY `id_user_invited` (`id_user_invited`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invitations`
--


--
-- Triggers `invitations`
--
DROP TRIGGER IF EXISTS `trg_invitations_bi`;
DELIMITER //
CREATE TRIGGER `trg_invitations_bi` BEFORE INSERT ON `invitations`
 FOR EACH ROW BEGIN
        SET NEW.date_of_invitation_send = current_timestamp;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE IF NOT EXISTS `password_recovery` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `long_code` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `user_name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `date_of_request` timestamp NULL DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `password_recovery_lc_UNIQUE` (`long_code`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `password_recovery`
--


--
-- Triggers `password_recovery`
--
DROP TRIGGER IF EXISTS `trg_password_recovery_bi`;
DELIMITER //
CREATE TRIGGER `trg_password_recovery_bi` BEFORE INSERT ON `password_recovery`
 FOR EACH ROW BEGIN
        SET NEW.date_of_request = current_timestamp;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `value` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `label` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci,
  `date_of_update` timestamp NULL DEFAULT NULL,
  `setting_order` int(11) DEFAULT NULL,
  `version` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`, `version`) VALUES
(1, 'logInIfNotVerified', '0', 'Allow users to LogIn if they are not active?', '', '2013-11-06 07:39:03', 100, 1),
(2, 'enabledSignUp', '0', 'SignUp is enabled?', 'If SignUp is disabled, no SignUps are allowed, in any case!', '2013-11-06 07:39:03', 200, 1),
(3, 'invitationBasedSignUp', '0', 'Only invited users are allowed to SignUp?', 'If SignUp is disabled, no user can SignUp, even invited ones!', '2013-11-06 07:39:03', 300, 1),
(4, 'invitationButtonDisplay', '0', 'Display the invitation button to all users?', '', '2013-11-06 07:39:03', 400, 1),
(5, 'invitationDefaultNumber', '5', 'Default number of invitations per user? <BR/> (if <0 = infinit number)', '', '2013-11-06 07:39:03', 500, 2),
(6, 'sender_invitation', 'webmaster@localhost', 'Invitation email is sent from:', 'When a new user is invited to this site, the invitation email is sent from this email address..', '2013-11-06 07:39:03', 600, 1),
(7, 'hoursInvitationLinkIsActive', '144', 'How many hours the invitation link is active? <BR/> (if <0 = forever)', '', '2013-11-06 07:39:03', 700, 1),
(8, 'hoursActivationLinkIsActive', '72', 'How many hours the activation link is active? <BR/> (if <0 = forever)', '', '2013-11-06 07:39:03', 900, 1),
(9, 'sender_signUp', 'webmaster@localhost', 'Activation email is sent from:', 'When a new user register to this site, an activation email is sent, in order to verify its email address authenticity.', '2013-11-06 07:39:03', 800, 1),
(10, 'hoursVerificationLinkIsActive', '144', 'How many hours the email verification link is active? (if <0 = forever)', 'How many hours the email verification link is active? (when user associates a new email address to his/hers account)', '2013-11-06 07:39:03', 1100, 1),
(11, 'sender_registerNewEmail', 'webmaster@localhost', 'Verification email is sent from:', 'When a user register a new email to its account, a verification email is sent to that email in order to confirm the email address authenticity.', '2013-11-06 07:39:03', 1000, 2),
(12, 'sender_passwordRecovery', 'webmaster@localhost', 'Password recovery email is sent from:', 'When a user forgot his/hers password and ask for a new password.', NULL, 1200, 1),
(13, 'hoursPasswordRecoveryLinkIsActive', '10', 'How many hours the password recovery request is active?', '', NULL, 1300, 1),
(14, 'trackPasswordRecoveryRequests', '', 'Track password recovery requests?', 'If it''s true, than if a password recovery request expire, it is not deleted, but it''s property "expired" is set to true. So in the database remain all password requests that have been made.', NULL, 1400, 1),
(15, 'fb_appId', '***', 'Facebook App ID', '', NULL, 1400, 1),
(16, 'fb_secret', '***', 'Facebook secret', '', NULL, 1400, 1),
(17, 'twitter_key', '***', 'Twitter Consumer key', '', NULL, 1400, 1),
(18, 'twitter_secret', '***', 'Twitter customer secret', '', NULL, 1400, 1);

--
-- Triggers `settings`
--
DROP TRIGGER IF EXISTS `trg_settings_bu`;
DELIMITER //
CREATE TRIGGER `trg_settings_bu` BEFORE UPDATE ON `settings`
 FOR EACH ROW BEGIN
        SET NEW.date_of_update = current_timestamp;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `site_emails_content`
--

CREATE TABLE IF NOT EXISTS `site_emails_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `subject` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `body` text COLLATE latin1_general_ci NOT NULL,
  `available_variables` text COLLATE latin1_general_ci,
  `date_of_update` timestamp NULL DEFAULT NULL,
  `version` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_emails_content_name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `site_emails_content`
--

INSERT INTO `site_emails_content` (`id`, `name`, `subject`, `body`, `available_variables`, `date_of_update`, `version`) VALUES
(1, 'sender_invitation', 'You had been invited ;)', '\r\n$linkToSignUpInvitationPage = CHtml::link(''here'', $this->createAbsoluteUrl(''users/signUp'', array(''email''=>$model->email, ''invitationCode''=>$model->invitation_code))); \r\nif ($this->module->invitationBasedSignUp):\r\n    $body_  = "<p>To signUp, please follow the next link:<br/> {$linkToSignUpInvitationPage}<br/>";\r\n    $body_ .= "use the following code:{$model->invitation_code} and please set this ({$model->email}) as the email address.";\r\nelse:\r\n    $body_ = "<p>To signUp, please follow the next link:<br/> {$linkToSignUpInvitationPage}.";\r\nendif;\r\nif ($this->module->hoursInvitationLinkIsActive > 0): \r\n    $body_ .= "<A href=''#validTime''>*</A>!</p>";\r\n    $body_ .= "<p><SMALL><A id=''validTime''>*</A>Your invitation link is valid for a period of:{$this->module->hoursInvitationLinkIsActive} hours from the time when your received this email!<SMALL></p>";\r\nendif;\r\n$body_ .= $model->note;\r\n$body_ .= "</p>";\r\n\r\nreturn $body_;\r\n                    ', '\r\n                    <DIV class="warning">ATTENTION! $body_ variable is parsed using eval(); function. Be very carefull who has the right to change the above php code and how you change it!</DIV>\r\n                    \r\n                    <DL>\r\n                        <DT>$model</DT>\r\n                        <DD>\r\n                            The model "Invitations".<BR/>\r\n                            <DL>\r\n                                <DT>$model->invitation_code</DT>\r\n                                <DD>The unique invitation code for this user.</DD>\r\n                            </DL>\r\n                        </DD>\r\n                        \r\n                        <DT>$this</DT>\r\n                        <DD>The controller instance.</BR>\r\n                            <DL>\r\n                                <DT>$this->module</DT>\r\n                                <DD>This module; aka BUM.</DD>\r\n                                \r\n                                <DT>$this->module->hoursInvitationLinkIsActive</DT>\r\n                                <DD>How many hours the invitation link is active/available? (if <0 = forever)</DD>\r\n                            </DL>\r\n                        </DD>\r\n                    </DL>\r\n                    ', NULL, 1),
(2, 'sender_signUp', 'Activation email.', '\r\n$linkToActivationPage = CHtml::link(''here'', $this->createAbsoluteUrl(''users/activate'', array(''acKey''=>$modelUsersData->activation_code)));\r\n$body_ = "<p>In order to activate your account please press {$linkToActivationPage}";\r\nif ($this->module->hoursActivationLinkIsActive > 0):    \r\n    $body_ .= "<A href=''#validTime''>*</A>!<p>";\r\n    $body_ .= "<p><SMALL><A id=''validTime''>*</A>Your activation link is valid for a period of: {$this->module->hoursActivationLinkIsActive} hours from the time when your account was created!<SMALL></p>";\r\nendif;\r\n\r\nreturn $body_;\r\n                    ', '\r\n                    <DIV class="warning">ATTENTION! $body_ variable is parsed using eval(); function. Be very carefull who has the right to change the above php code and how you change it!</DIV>\r\n                    \r\n                    <DL>\r\n                        <DT>$modelUsersData</DT>\r\n                        <DD>\r\n                            The model "UsersData".<BR/>\r\n                            <DL>\r\n                                <DT>$modelUsersData->activation_code</DT>\r\n                                <DD>The unique activation code of this user.</DD>\r\n                            </DL>\r\n                        </DD>\r\n                        \r\n                        <DT>$this</DT>\r\n                        <DD>The controller instance.</BR>\r\n                            <DL>\r\n                                <DT>$this->module</DT>\r\n                                <DD>This module; aka BUM.</DD>\r\n                                \r\n                                <DT>$this->module->hoursActivationLinkIsActive</DT>\r\n                                <DD>How many hours the activation link is active/available? (if <0 = forever)</DD>\r\n                            </DL>\r\n                        </DD>\r\n                    </DL>\r\n                    ', NULL, 1),
(3, 'sender_registerNewEmail', 'Email Verification', '\r\n$linkToEmailVerificationPage = CHtml::link(''here'', $this->createAbsoluteUrl(''emails/verify'', array(''ckKey''=>$modelEmails->verification_code)));\r\n$body_ = "<p>To verify your email address, please follow this link {$linkToEmailVerificationPage}.";\r\nif ($this->module->hoursVerificationLinkIsActive > 0):\r\n    $body_ .= "<A href=''#validTime''>*</A>!<p>";\r\n    $body_ .= "<p><SMALL><A id=''validTime''>*</A>Your verification link is valid for a period of: {$this->module->hoursVerificationLinkIsActive} hours from the time when your submitted your email!<SMALL></p>";\r\nendif;\r\n\r\nreturn $body_;\r\n                        ', '\r\n                    <DIV class="warning">ATTENTION! $body_ variable is parsed using eval(); function. Be very carefull who has the right to change the above php code and how you change it!</DIV>\r\n                    \r\n                    <DL>\r\n                        <DT>$modelEmails</DT>\r\n                        <DD>\r\n                            The model "Emails".<BR/>\r\n                            <DL>\r\n                                <DT>$modelEmails->verification_code</DT>\r\n                                <DD>The verification code needed to verify user''s email address.</DD>\r\n                            </DL>\r\n                        </DD>\r\n                        \r\n                        <DT>$this</DT>\r\n                        <DD>The controller instance.</BR>\r\n                            <DL>\r\n                                <DT>$this->module</DT>\r\n                                <DD>This module; aka BUM.</DD>\r\n                                \r\n                                <DT>$this->module->hoursVerificationLinkIsActive</DT>\r\n                                <DD>How many hours the email verification link is active? (if <0 = forever)</DD>\r\n                            </DL>\r\n                        </DD>\r\n                    </DL>\r\n                    ', NULL, 1),
(4, 'sender_passwordRecovery', 'You requested a new password?', '\r\n$linkToPasswordRecoveryAskCodePage = CHtml::link(''here'', $this->createAbsoluteUrl(''users/passwordRecoveryAskCode'', array(''lc''=>$modelPasswordRecovery->long_code, ''em''=> md5($modelPasswordRecovery->email), ''code''=>$modelPasswordRecovery->code)));\r\n$body_  = "<p>To reset your password, please follow this link <b>{$linkToPasswordRecoveryAskCodePage}</b></p>";\r\n$body_ .= "<p>and insert the following code <b>{$modelPasswordRecovery->code}</b></p>";\r\n$body_ .= "<A href=''#validTime''>*</A>!<p>";\r\n$body_ .= "<p><SMALL><A id=''validTime''>*</A>Your link is valid for a period of:{$this->module->hoursPasswordRecoveryLinkIsActive} hours from the time when your placed the request!<SMALL></p>";\r\n\r\nreturn $body_; \r\n                    ', '\r\n                    <DIV class="warning">ATTENTION! $body_ variable is parsed using eval(); function. Be very carefull who has the right to change the above php code and how you change it!</DIV>\r\n                    \r\n                    <DL>\r\n                        <DT>$modelPasswordRecovery</DT>\r\n                        <DD>\r\n                            The model "PasswordRecovery".<BR/>\r\n                            <DL>\r\n                                <DT>$modelPasswordRecovery->long_code</DT>\r\n                                <DD>The unique password recovery code (the long code used in the link to recovey page).</DD>\r\n                                \r\n                                <DT>$modelPasswordRecovery->code</DT>\r\n                                <DD>The unique password recovery code (should be inserted by the user).</DD>\r\n                            </DL>\r\n                        </DD>\r\n                        \r\n                        <DT>$this</DT>\r\n                        <DD>The controller instance.</BR>\r\n                            <DL>\r\n                                <DT>$this->module</DT>\r\n                                <DD>This module; aka BUM.</DD>\r\n                                \r\n                                <DT>$this->module->hoursPasswordRecoveryLinkIsActive</DT>\r\n                                <DD>How many hours the password recoverty link is active/available?</DD>\r\n                            </DL>\r\n                        </DD>\r\n                    </DL>\r\n                    ', NULL, 1);

--
-- Triggers `site_emails_content`
--
DROP TRIGGER IF EXISTS `trg_site_emails_content_bu`;
DELIMITER //
CREATE TRIGGER `trg_site_emails_content_bu` BEFORE UPDATE ON `site_emails_content`
 FOR EACH ROW BEGIN
        SET NEW.date_of_update = current_timestamp;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(60) COLLATE latin1_general_ci NOT NULL DEFAULT 'noEmail@noEmail.com',
  `pass` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `salt` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date_of_creation` timestamp NULL DEFAULT NULL,
  `date_of_update` timestamp NULL DEFAULT NULL,
  `date_of_last_access` timestamp NULL DEFAULT NULL,
  `date_of_password_last_change` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_name_UNIQUE` (`user_name`),
  UNIQUE KEY `users_email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `pass`, `salt`, `name`, `surname`, `active`, `status`, `date_of_creation`, `date_of_update`, `date_of_last_access`, `date_of_password_last_change`) VALUES
(1, 'admin', 'admin@noEmail.com', '$6Io6D7.V.UDk', '527a11eebea366.60587991', 'Admin', 'Admin', 1, 0, '2013-11-06 10:54:54', '2013-11-13 10:15:00', '2013-11-13 10:15:00', '2013-11-06 10:54:54'),
(2, 'demo', 'demo@noEmail.com', '$6w/wPDICxNag', '527a11eeeccb89.74586718', 'Demo', 'Demo', 1, 0, '2013-11-06 10:54:54', '2013-11-13 10:12:01', '2013-11-13 10:12:01', '2013-11-06 10:54:54'),
(3, 'olalekanarowoselu', 'olalekanarowoselu@gmail.com', '$6iiQyjXwNMTk', '52803709ac2f11.50636642', 'Olalekan', 'Arowoselu', 1, 0, '2013-11-11 02:46:49', '2013-11-13 10:12:12', '2013-11-13 10:12:12', '2013-11-11 02:46:49'),
(4, 'olalekanarowoselu2', 'olalekanarowoselu@yahoo.co.uk', '$6iiQyjXwNMTk', '5280375a43cfb2.42625630', 'Olalekan', 'Arowoselu', 1, 10, '2013-11-11 02:48:10', '2013-11-11 16:57:55', '2013-11-11 16:57:55', '2013-11-11 02:48:10');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `trg_users_bi`;
DELIMITER //
CREATE TRIGGER `trg_users_bi` BEFORE INSERT ON `users`
 FOR EACH ROW BEGIN
        SET NEW.date_of_creation = current_timestamp;
        SET NEW.date_of_update =  current_timestamp;
        SET NEW.date_of_last_access =  current_timestamp;
        SET NEW.date_of_password_last_change =  current_timestamp;
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_users_bu`;
DELIMITER //
CREATE TRIGGER `trg_users_bu` BEFORE UPDATE ON `users`
 FOR EACH ROW BEGIN
        SET NEW.date_of_update =  current_timestamp;
        IF NEW.pass != OLD.pass THEN
            SET NEW.date_of_password_last_change =  current_timestamp;
        END IF;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE IF NOT EXISTS `users_data` (
  `id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE latin1_general_ci,
  `obs` text COLLATE latin1_general_ci,
  `site` varchar(1500) COLLATE latin1_general_ci DEFAULT NULL,
  `facebook_address` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `facebook_user_id` bigint(20) unsigned DEFAULT NULL,
  `twitter_address` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `twitter_user_id` bigint(20) unsigned DEFAULT NULL,
  `activation_code` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `date_of_update` timestamp NULL DEFAULT NULL,
  `invitations_left` smallint(6) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `description`, `obs`, `site`, `facebook_address`, `facebook_user_id`, `twitter_address`, `twitter_user_id`, `activation_code`, `date_of_update`, `invitations_left`) VALUES
(1, 'The default SuperAdmin user!', NULL, NULL, NULL, NULL, NULL, NULL, 'b71a9a0cd040a305e48fd137a39252872b113c3c', '2013-11-06 10:54:54', -1),
(2, 'The default regular user!', NULL, NULL, NULL, NULL, NULL, NULL, 'd99247ae2dd180a7be197c36276f1c3ada55fe95', '2013-11-06 10:54:54', -1),
(3, 'me myself and i', 'me myself and ik', 'hrdotnetsolutions.net', '', NULL, '', NULL, 'd09efad67edd519aeba387687eca9c4d3d683707', '2013-11-11 17:11:00', 5),
(4, 'me myself and ik', 'me myself and ik', 'hrdotnetsolutions.net', '', NULL, '', NULL, 'd09efad67edd519aeba387687eca9c4d3d683707', '2013-11-11 17:11:17', 5);

--
-- Triggers `users_data`
--
DROP TRIGGER IF EXISTS `trg_users_data_bi`;
DELIMITER //
CREATE TRIGGER `trg_users_data_bi` BEFORE INSERT ON `users_data`
 FOR EACH ROW BEGIN
        SET NEW.date_of_update =  current_timestamp;
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_users_data_bu`;
DELIMITER //
CREATE TRIGGER `trg_users_data_bu` BEFORE UPDATE ON `users_data`
 FOR EACH ROW BEGIN
        SET NEW.date_of_update =  current_timestamp;
    END
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invitations_ibfk_2` FOREIGN KEY (`id_user_invited`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD CONSTRAINT `password_recovery_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `site_emails_content`
--
ALTER TABLE `site_emails_content`
  ADD CONSTRAINT `site_emails_content_ibfk_1` FOREIGN KEY (`name`) REFERENCES `settings` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `users_data_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
