<?php
/**
 * SEF component for Joomla! 1.5
 *
 * @author      ARTIO s.r.o.
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @version     3.1.0
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access.');

/**
 * Main class handling JoomSEF's cache
 *
 */
class SEFCache
{
    var $cacheUrl           = array();
    var $cacheItemid        = array();
    var $cacheHit           = array();
    var $cacheMetaTitle     = array();
    var $cacheMetaDesc      = array();
    var $cacheMetaKey       = array();
    var $cacheMetaLang      = array();
    var $cacheMetaRobots    = array();
    var $cacheMetaGoogle    = array();
    var $cacheCanonicalLink = array();

    var $cacheLoaded = false;
    var $loadCacheCalled = false;
    var $cacheFile = null;
    var $maxSize;
    var $minHits;

    /**
     * Sets the main variables and loads the cache from disk
     *
     * @param int $maxSize
     * @param int $minHits
     * @return sefCache
     */
    function sefCache($maxSize, $minHits)
    {
        $this->maxSize = $maxSize;
        $this->minHits = $minHits;
        //$this->cacheFile = JPATH_ROOT.DS.'components'.DS.'com_sef'.DS.'cache'.DS.'cache.php';
        $this->cacheFile = JPATH_CACHE.DS.'joomsef.cache';

        $this->loadCache();
    }

    function &getInstance()
    {
        static $instance;
        if( !isset($instance) ) {
            $sefConfig =& SEFConfig::getConfig();
            $instance = new sefCache($sefConfig->cacheSize, $sefConfig->cacheMinHits);
        }
        return $instance;
    }

    /**
     * Loads the cache from disk to memory
     *
     */
    function loadCache()
    {
        // Was this function already called?
        if ($this->loadCacheCalled) return;
        $this->loadCacheCalled = true;
        
        // Is cache already loaded?
        if ($this->cacheLoaded) return;

        jimport('joomla.filesystem.file');
        jimport('joomla.filesystem.folder');

        if (JFile::exists($this->cacheFile)) {
            // Load the cache from disk
            include_once($this->cacheFile);
            
            // check the cache variables
            if (!isset($url)            || !is_array($url) ||
                !isset($Itemids)        || !is_array($Itemids) ||
                !isset($hit)            || !is_array($hit) ||
                !isset($metaTitles)     || !is_array($metaTitles) ||
                !isset($metaDescs)      || !is_array($metaDescs) ||
                !isset($metaKeys)       || !is_array($metaKeys) ||
                !isset($metaLangs)      || !is_array($metaLangs) ||
                !isset($metaRobots)     || !is_array($metaRobots) ||
                !isset($metaGoogles)    || !is_array($metaGoogles) ||
                !isset($canonicalLink)  || !is_array($canonicalLink)
                )
            {
                JError::raiseWarning(100, JText::_('JoomSEF').': '.JText::_('Cache file is corrupted.'));
                return;
            }
        }
        else {
            // Set the empty cache arrays
            if (!JFolder::exists(dirname($this->cacheFile))) {
                JFolder::create(dirname($this->cacheFile));
            }

            $url            = array();
            $hit            = array();
            $Itemids        = array();
            $metaTitles     = array();
            $metaDescs      = array();
            $metaKeys       = array();
            $metaLangs      = array();
            $metaRobots     = array();
            $metaGoogles    = array();
            $canonicalLink  = array();
        }

        // Assign the arrays to cache variables
        $this->cacheUrl         = $url;
        $this->cacheItemid      = $Itemids;
        $this->cacheHit         = $hit;
        $this->cacheMetaTitle   = $metaTitles;
        $this->cacheMetaDesc    = $metaDescs;
        $this->cacheMetaKey     = $metaKeys;
        $this->cacheMetaLang    = $metaLangs;
        $this->cacheMetaRobots  = $metaRobots;
        $this->cacheMetaGoogle  = $metaGoogles;
        $this->cacheCanonicalLink = $canonicalLink;
        
        $this->cacheLoaded = true;
    }

    /**
     * Helper function for saving an array into includeable file
     * Returns the string ready for writing to disk
     *
     * @param array $array
     * @param string $arrayName
     * @return string
     */
    function saveArray(&$array, $arrayName)
    {
        $str = "\n";
        $str .= '$'.$arrayName.'=array();';
        if (count($array) > 0) {
            reset($array);
            foreach($array as $sef => $val) {
                $str .= "\n";
                $str .= '$'.$arrayName.'[\''.$sef.'\']=\''.str_replace(array('\\', '\''), array('\\\\', '\\\''), $val).'\';';
            }
        }

        return $str;
    }

    /**
     * Saves the cache arrays to disk
     */
    function saveCache()
    {
        // Security check
        $cache = '<?php
defined(\'_JEXEC\') or die(\'Direct access to this location is not allowed.\');';

        // Add all the arrays
        $cache .= $this->saveArray($this->cacheUrl, 'url');
        $cache .= $this->saveArray($this->cacheItemid, 'Itemids');
        $cache .= $this->saveArray($this->cacheHit, 'hit');
        $cache .= $this->saveArray($this->cacheMetaTitle, 'metaTitles');
        $cache .= $this->saveArray($this->cacheMetaDesc, 'metaDescs');
        $cache .= $this->saveArray($this->cacheMetaKey, 'metaKeys');
        $cache .= $this->saveArray($this->cacheMetaLang, 'metaLangs');
        $cache .= $this->saveArray($this->cacheMetaRobots, 'metaRobots');
        $cache .= $this->saveArray($this->cacheMetaGoogle, 'metaGoogles');
        $cache .= $this->saveArray($this->cacheCanonicalLink, 'canonicalLink');

        $cache .= "\n?>";

        // write the cache to disk
        $sefConfig =& SEFConfig::getConfig();
        
        if (!isset($sefConfig->cacheFLock) || !$sefConfig->cacheFLock) {
            // don't use flock
            if (!$this->lock(10)) return;
        }
        
        $cachefile = @fopen($this->cacheFile, 'wb');
        if ($cachefile) {            
            if (isset($sefConfig->cacheFLock) && $sefConfig->cacheFLock) {
                // use flock
                if (!flock($cachefile, LOCK_EX)) {
                    @fclose($cachefile);
                    return;
                }
            }
            
            @fwrite($cachefile, $cache);
            @fclose($cachefile);
        }
        
        if (!isset($sefConfig->cacheFLock) || !$sefConfig->cacheFLock) {
            // don't use flock
            $this->unlock();
        }
    }

    /**
     * Locks the cache file in an OS independent way
     * Returns true if lock was acquired, false otherwise
     *
     * @return boolean
     */
    function lock($timeout = 10)
    {
        $lockfile = $this->cacheFile.'.lck';

        // Try to read the timeout information from the lock
        $t = @file($lockfile);
        
        // Try to create the lock
        if( !$this->lockSet($timeout) ) {
            // Check the lock timeout
            if( $t !== false ) {
                $t = intval(trim(implode($t)));
                if (time() >= $t) {
                    // Remove the lock
                    @unlink($lockfile);
                    
                    // Try to create the lock
                    return $this->lockSet($timeout);
                }
            }
            
            return false;
        }
        
        return true;
    }
    
    /**
     * Creates the lock
     *
     * @param  int $timeout
     * @return boolean
     */
    function lockSet($timeout)
    {
        $lockfile = $this->cacheFile.'.lck';
        
        $f = @fopen($lockfile, 'x');
        if( $f !== false )  {
            // Save the timeout information
            $t = time() + intval($timeout);
            if (false === @fwrite($f, $t)) {
                @fclose($f);
                @unlink($lockfile);
                return false;
            }
            
            return @fclose($f);
        }
        
        return false;
    }
    
    /**
     * Unlocks the cache file in an OS independent way
     *
     */
    function unlock()
    {
        $lockfile = $this->cacheFile.'.lck';
        @unlink($lockfile);
    }
    
    /**
     * Tries to find a nonSEF URL corresponding with given SEF URL
     * If updateHits is set the function will increase the cached URL hit count
     *
     * @param string $sef
     * @param boolean $updateHits
     * @return object
     */
    function getNonSefUrl($sef, $updateHits = true)
    {
        // Load the cache if needed
        if (!$this->cacheLoaded) $this->loadCache();
        
        // Check if the cache was loaded successfully
        if (!$this->cacheLoaded) return false;

        $sefConfig =& SEFConfig::getConfig();

        // If we are tolerant for trailing slash
        if( $sefConfig->transitSlash ) {
            // Remove trailing slash
            $sef = rtrim($sef, '/');
            if( !isset($this->cacheUrl[$sef]) ) {
                // If there isn't URL without trailing slash, add the slash
                $sef .= '/';
            }
        }
        
        // Does the item exist in cache?
        if (isset($this->cacheUrl[$sef])) {
            // Create the object to be returned
            $row = new stdClass();
            $row->sefurl     = $sef;
            $row->origurl    = $this->cacheUrl[$sef];
            $row->cpt        = $this->cacheHit[$sef];
            $row->Itemid     = (isset($this->cacheItemid[$sef])     ? $this->cacheItemid[$sef] : '');
            $row->metatitle  = (isset($this->cacheMetaTitle[$sef])  ? $this->cacheMetaTitle[$sef] : '');
            $row->metadesc   = (isset($this->cacheMetaDesc[$sef])   ? $this->cacheMetaDesc[$sef] : '');
            $row->metakey    = (isset($this->cacheMetaKey[$sef])    ? $this->cacheMetaKey[$sef] : '');
            $row->metalang   = (isset($this->cacheMetaLang[$sef])   ? $this->cacheMetaLang[$sef] : '');
            $row->metarobots = (isset($this->cacheMetaRobots[$sef]) ? $this->cacheMetaRobots[$sef] : '');
            $row->metagoogle = (isset($this->cacheMetaGoogle[$sef]) ? $this->cacheMetaGoogle[$sef] : '');
            $row->canonicallink = (isset($this->cacheCanonicalLink[$sef]) ? $this->cacheCanonicalLink[$sef] : '');

            // Update hits if set to
            if($updateHits) {
                $this->cacheHit[$sef]++;
                $this->saveCache();
            }

            return $row;
        } else {
            // Cache record not found
            return false;
        }
    }

    /**
     * Tries to find a SEF URL corresponding with given nonSEF URL
     *
     * @param string $nonsef
     * @param string $Itemid
     * @return string
     */
    function getSefUrl($nonsef, $Itemid = null)
    {
        $sefConfig =& SEFConfig::getConfig();

        // Load the cache if needed
        if (!$this->cacheLoaded) $this->LoadCache();

        // Check if the cache was loaded successfully
        if (!$this->cacheLoaded) return false;

        // Check if non-sef url doesn't contain Itemid
        $vars = array();
        parse_str(str_replace('index.php?', '', $nonsef), $vars);
        if (is_null($Itemid) && strpos($nonsef, 'Itemid=')) {
            if (isset($vars['Itemid'])) $Itemid = $vars['Itemid'];
            $nonsef = SEFTools::removeVariable($nonsef, 'Itemid');
        }

        // Get the ignoreSource parameter
        if (isset($vars['option'])) {
            $params = SEFTools::getExtParams($vars['option']);
            $extIgnore = $params->get('ignoreSource', 2);
        } else {
            $extIgnore = 2;
        }
        $ignoreSource = ($extIgnore == 2 ? $sefConfig->ignoreSource : $extIgnore);

        if( $ignoreSource || is_null($Itemid) ) {
            // Search without Itemid
            if (($key = array_search($nonsef, $this->cacheUrl)) === false) return false;
            else return $key;
        }
        else {
            // Search with Itemid
            // Get all sef urls matching non-sef url
            $keys = array_keys($this->cacheUrl, $nonsef);
            if (count($keys) > 0) {
                // Try to find the key with corresponding Itemid
                foreach ($keys as $key) {
                    if (isset($this->cacheItemid[$key]) && ($this->cacheItemid[$key] == $Itemid)) {
                        return $key;
                    }
                }
            }
            return false;
        }
    }

    /**
     * Adds the URL to cache
     *
     * @param string $nonsef
     * @param string $sef
     * @param int $hits
     * @param string $Itemid
     * @param string $metatitle
     * @param string $metadesc
     * @param string $metakey
     * @param string $metalang
     * @param string $metarobots
     * @param string $metagoogle
     * @param string $canonicalLink
     */
    function addUrl($nonsef, $sef, $hits, $Itemid = '', $metatitle = '', $metadesc = '', $metakey = '', $metalang = '', $metarobots = '', $metagoogle = '', $canonicallink = '')
    {
        // check if URL's hits count is enough to be stored
        if ($hits < $this->minHits)    return;

        // check the cache size
        if (count($this->cacheUrl) < $this->maxSize) {
            // OK, we can add the URL to the end
            $this->cacheUrl[$sef] = $nonsef;
            $this->cacheHit[$sef] = $hits;
            if ($Itemid     != '') $this->cacheItemid[$sef] = $Itemid;
            if ($metatitle  != '') $this->cacheMetaTitle[$sef] = $metatitle;
            if ($metadesc   != '') $this->cacheMetaDesc[$sef] = $metadesc;
            if ($metakey    != '') $this->cacheMetaKey[$sef] = $metakey;
            if ($metalang   != '') $this->cacheMetaLang[$sef] = $metalang;
            if ($metarobots != '') $this->cacheMetaRobots[$sef] = $metarobots;
            if ($metagoogle != '') $this->cacheMetaGoogle[$sef] = $metagoogle;
            if ($canonicallink != '') $this->cacheCanonicalLink[$sef] = $canonicallink;

            // sort the cache by hit count
            asort($this->cacheHit, SORT_NUMERIC);

            // save the cache to disk
            $this->saveCache();
        }
        else {
            // get the URL with minimum hits count
            reset($this->cacheHit);
            list($key, $value) = each($this->cacheHit);

            // check if new URL is more often used
            if ($hits > $value) {
                // It is, let's change it
                unset($this->cacheHit[$key]);
                unset($this->cacheUrl[$key]);
                unset($this->cacheItemid[$key]);
                unset($this->cacheMetaTitle[$sef]);
                unset($this->cacheMetaDesc[$sef]);
                unset($this->cacheMetaKey[$sef]);
                unset($this->cacheMetaLang[$sef]);
                unset($this->cacheMetaRobots[$sef]);
                unset($this->cacheMetaGoogle[$sef]);
                unset($this->cacheCanonicalLink[$sef]);

                $this->cacheUrl[$sef] = $nonsef;
                $this->cacheHit[$sef] = $hits;
                if ($Itemid != '')     $this->cacheItemid[$sef]      = $Itemid;
                if ($metatitle != '')  $this->cacheMetaTitle[$sef]   = $metatitle;
                if ($metadesc != '')   $this->cacheMetaDesc[$sef]    = $metadesc;
                if ($metakey != '')    $this->cacheMetaKey[$sef]     = $metakey;
                if ($metalang != '')   $this->cacheMetaLang[$sef]    = $metalang;
                if ($metarobots != '') $this->cacheMetaRobots[$sef]  = $metarobots;
                if ($metagoogle != '') $this->cacheMetaGoogle[$sef]  = $metagoogle;
                if ($canonicallink != '') $this->cacheCanonicalLink[$sef] = $canonicallink;

                asort($this->cacheHit, SORT_NUMERIC);
                $this->saveCache();
            }
        }
    }

}
?>