-- DD_Newsticker table SQL script
-- This will install all the tables to run DD SocialShare

--
-- Table structure for table `#__dd_newsticker`
--

CREATE TABLE IF NOT EXISTS `#__dd_newsticker` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',

  `state` tinyint(1) NOT NULL DEFAULT '0',

  `catid` int(11) NOT NULL DEFAULT 0,
  `topic` int(11) NOT NULL DEFAULT 0,
  `source` varchar(255) NOT NULL DEFAULT '',
  `positiv` int(1) NOT NULL,
  `eventdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',

  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',

  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(11) NOT NULL DEFAULT '1',
  `language` char(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for table `#__dd_socialshare`
--
ALTER TABLE `#__dd_newsticker`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `#__dd_socialshare`
--
ALTER TABLE `#__dd_newsticker`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
