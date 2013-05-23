<?php

/* ***************************************************
 * *********** M A N A G E   C O M M E N T S *********
 * ***************************************************
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_CONFIRM_NOTIFY', 'Wollen Sie auch Benachrichtigungen verschicken ?\n[Abbrechen=keine Benachrichtigung]');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_SENT_TO', 'Die Benachrichtigung wurde gesendet an : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_NOT_SENT', 'Benachrichtigung nicht geschrieben');

JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_id', 'Id');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_writer', 'Autor'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_userid', 'Benutzerid'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_notify', 'Benachrichtigung'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_url', 'Url'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_date', 'Datum'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_comment', 'Kommentar <br /><i>(Links und Bilder sind deaktiviert)</i>'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_contentitem', 'Inhaltselement'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_published', 'Ver&ouml;ffentlicht (Autor-Benachrichtigung)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_delete', 'L&ouml;schen (Autor-Benachrichtigung)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_ip', 'IP'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingyes', 'Ja Stimme'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingno', 'Nein Stimme'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_parentid', '&Uuml;bergeordnetes Element'); 



/* ***************************************************
 * *************** S E T T I N G *********************
 * ***************************************************
 */
/*
 * common
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_NAME', 'Name: ');
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_COMPONENT', 'Komponente: ');
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_BASIC_SETTINGS', 'Grundeinstellungen'); 
/*
 * generalPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_GENERAL_PAGE', 'Grundeinstellung'); 
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_CAPTION', 'Komplett Deinstallieren:'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_HELP', 'L&ouml;scht auch die Tabellen in der Datenbank! Aktivieren Sie diese Option nicht, wenn Sie JoomlaComments nur deaktivieren wollen.'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_CAPTION', 'Mambot Inhalts Funktion:');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_HELP', '<u>Nur f&uuml;r Experten!</u> Sie k&ouml;nnen hier die joscomment mambot Funktionen ver&auml;ndern, wenn Sie eine <b>ver&auml;nderte</b> Version des Inhalt Codes haben (Zum Beispiel: Anzeige der nur lesen Funktion zu erst.');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_CAPTION', 'Frontend Sprache:');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_HELP', 'Bei Auto wird die in der Joomla Sprachkonfiguration eingestellte Sprache benutzt');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_CAPTION', 'Backend Sprache:');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_HELP', 'Bei Auto wird die in der Joomla Sprachkonfiguration eingestellte Sprache benutzt');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_CAPTION', 'Lokaler Zeichensatz:<br />Falls Sie von einer &auml;lteren Version als 3.0 updaten beachten Sie bitte die Beschreibung rechts!');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPnoiconv', 'Wird nicht benutzt!! php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a><u/> ist nicht vorhanden. <b>Falls Sie eine nicht utf-8 oder iso-8859-1 Joomla Installation benutzen, kontaktieren Sie bitte Ihren Administrator ODER deaktivieren die Ajax Support Paramter.</b>');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPiconv', 'Php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a> ist auf Ihrem Server vorhanden.'
	                    .  '<br /><b>Geben Sie den Zeichensatz Ihrer Joomla Installation ein, falls er nicht utf-8 ist.<br />Klicken Sie <a href="http://www.gnu.org/software/libiconv/" target="_blank">HIER</a> um herauszufinden ob die iconv library diesen unterst&uuml;tzt! Falls nicht kontaktieren Sie den Joomlacomment Support.</b> '
						.  '<br /><br /><b>Falls Sie von einer &auml;lteren Version als 3.0.0 updaten</b>, gehen Sie, sobald Sie die Einstellung gespeichert haben, <u> auf \"Kommentare verwalten\" und Benutzen die \"Kovertieren zu LCharset\"</u> Funktion um die betroffenen Kommentare zu konvertieren.'
        				.  '<br />Falls Sie immer den Ajax Modus verwendet haben, konvertieren Sie bitte alle Kommentare.'
        				.  '<br />Kommetare (mit Ajax erstellt) m&uuml;ssen konvertiert werden, andere (ohne Ajax erstellt) m&uuml;ssen nicht konvertiert werden'
        				.  ' In diesem Fall, w&auml;hlen Sie nur die betroffenen Kommentare aus (die mit den auff&auml;hligen / falschen Zeichen, grade bei Umlauten!).'
        				);
/* SECTIONS_CATEGORIES */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_CAPTION', 'Ausgeschlossene / Eingeschlossene Bereiche:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_HELP', 'Klicken Sie hier um Bereiche aus- oder einzuschlie&szlig;en.<br />Benutzen Sie STRG oder SHIFT um mehrere Bereiche ab- bzw. auszuw&auml;hlen.');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_CAPTION', 'Ausgeschlossene/ Eingeschlossene:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_HELP', 'Klicken Sie hier um Kategorien aus- oder einzuschlie&szlig;en.<br />Benutzen Sie STRG oder SHIFT um mehrere Kategorien ab- bzw. auszuw&auml;hlen.');
/* TECHNICAL */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TECHNICAL', 'Technische Parameter (Nur f&uuml;r joomlacomment Support)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_CAPTION', 'Benutzername f&uuml;r die Debugbenachrichtigungen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_HELP', 'Die Debug Nachrichtgen, werden nur f&uuml;r diesen Benutzernamen angezeigt.');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_CAPTION', 'xmlErrorAlert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_CAPTION', 'ajaxdebug:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_HELP', '');

/*
 * layoutPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_LAYOUT', 'Layout');
/* FRONTPAGE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_FRONTPAGE', '"Weiter lesen" Link, falls Einleitungstext'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_CAPTION', 'Anzeige "Weiter lesen":');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_HELP', 'Bei Einleitungstexten (Startseite, Blog...) wird ein \"Kommentar schreiben\" Link mit der Anzahl der existieren Kommentare f&uuml;r diesen Artikel angezeigt');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_CAPTION', 'Wird nur angezeigt wenn ein \"Weiter lesen\" Link existiert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_HELP', 'Wird nur angezeigt, wenn die \"Weiter lesen\" Einstellung (im Joomla Administrator im Bereich Men&uuml;) aktiviert ist. JA ist empfohlen.');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_CAPTION', 'Nicht anzeigen falls ein \"Weiter lesen\" Link schon existiert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_HELP', 'Falls ein Artikel zu dem kompletten Artikel per (Weiter lesen oder Titel) verlinkt und nur der Einleitungstext angezeigt wird');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_CAPTION', 'Vorschau sichtbar:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_HELP', 'Vorschauanzeige der letzen Artikel (falls \"Weiter lesen\" aktiviert ist)');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_CAPTION', 'Vorschau L&auml;nge:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_CAPTION', 'Zeilenl&auml;nge der Vorschau:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_HELP', ''); 
/* TEMPLATES */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TEMPLATES', 'Templates'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_template_CAPTION', 'Standard template:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_HELP', 'Templates bestimmen das Aussehen von Joomlacomment.'
				   		. '<br />Falls Sie Smilies (emoticons) aktiviert haben, geben Sie bitte die Nummern Ihrer Smilies (siehe unten) f&uuml;r Ihr Template an.'
				   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_CAPTION', 'Kopiere derzeitiges Standard Template in einen speziellen Ordner, wo Sie Ihr eigenes erstellen k&ouml;nnen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_HELP', 'Falls aktiviert, wird sobald Sie die Einstellungen speichern, das ausgew&auml;hlte standard Template in einen speziellen Ordner kopiert, in dem Sie es bearbeiten und nach Ihren W&uuml;nschen gestalten k&ouml;nnen. Es wird nur kopiert falls es noch nicht existiert.');
JOSC_define('_JOOMLACOMMENT_ADMIN_TEMPLATE_CUSTOM_LOCATION', 'Ort:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_CAPTION', 'Ihr eigenes Template:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_HELP', 'Benutzen Sie die Kopier Einstellungen um ein Standard Template zu kopieren. Danach k&ouml;nnen Sie den HTML oder CSS Code bearbeiten (es wird nicht &uuml;berschrieben, w&auml;hrend des n&auml;chsten Udpates. Falls kein eigenes Template ausgew&auml;hlt ist, wird das Standard Template benutztoverwritten during next upgrades).');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_CAPTION', 'Bearbeiten Sie Ihr Template:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_HELP', 'Falls die Einstellung auf JA gesetzt ist, k&ouml;nnen Sie den HTML und CSS Code Ihres ausgew&auml;hlten Templates bearbeiten. Nach dem Speichern werden 2 neue Tabs angezeigt.'
                   		. '<br />Bei NEIN wird die Speichern Funktion vereinfacht (schneller).</b>'
                   		);                   		
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_CAPTION', 'Javascript Bibliothek einbinden:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_HELP', 'Binden Sie hier eine Javascript Bibliothek ein, falls Sie ein Template mit Effekten benutzen (JQuery, Mootools...)'
       					. '<br />Setzen Sie die Einstellung auf NEIN, falls die Bibliothek schon geladen wurde. Ansonsten k&ouml;nnen Javascript Fehler und Probleme entstehen.'
                   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_CAPTION', 'Anzahl an Spalten im Eingabefeld:');
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_HELP', 'Sie k&uuml;nnen diese Einstellung dazu verwenden die Breite der Text Eingabe Felder an Ihre Webseite anzupassen.');
                   		
/* EMOTICONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_EMOTICONS', 'Smilies (Emoticons)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_CAPTION', 'Emoticon (smilies) Unterst&uuml;tzung:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_HELP', 'Erlaube die Benutzung von Smilies in Kommentaren?');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_CAPTION', 'Emoticon pack:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_CAPTION', 'Anzahl von Emoticons pro Zeile:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_HELP', 'Anzahl der angezeigten Smilies pro Zeile. Bei 0 gibt es keine Begrenzung.'
        				. '<br />Proposition: Benutzen Sie 12 falls Sie <i>emotop</i> templates benutzen (emoticon werden oben angezeigt) und 2 oder 3 falls m&ouml;glich bei anderen(Links oben angezeigte emoticon templates). Einfach ausprobieren und schauen welches die beste EInstellung ist!'
        				);
/*
 * postingPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_POSTING', 'Kommentare');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_CAPTION', 'Ajax support (empfohlen):');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_HELP', 'Asynchronous JavaScript + XML');
/* STRUCTURE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_STRUCTURE', 'Struktur'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_CAPTION', 'Erlaube verschachtelte Kommentare:');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_HELP', 'Dies erlaubt Benutzern auf andere Kommentare zu antworten (nicht nur dem letzten), mit der entsprechenden verschachtelten Ansicht.');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_CAPTION', 'Nur Moderatoren');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_HELP', 'Nur Moderatoren ist es Gesetatet');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_CAPTION', 'Indent (pixels):');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_HELP', 'This is used to indent messages in threaded view.');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_CAPTION', 'Comments sorting (if NOT nested comments):');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_FIRST', 'Neue Eintr&auml;ge zu erst');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_LAST', 'Neue Eintr&auml;ge am Ende');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_HELP', 'Sortierung der Kommentare: wird nur Benutzt falls verschachtelte Kommentare nicht erlaubt sind.<br /> Falls die Neuen Eintr&auml;ge zu erst angezeigt werden, wird das Formular oben angezeigt, falls nicht unten');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_CAPTION', 'Anzahl der Kommentare pro Seite:');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_HELP', 'Anzahl der Kommentare die pro Seite angezeigt werden sollen');
/* POSTING */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_POSTING', 'Kommentar'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_CAPTION', 'Benutzer Webseiten Feld:');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_HELP', 'Erlaube Benutzern Ihre Webseite anzugeben.');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_CAPTION', 'UBB code Unterst&uuml;tzung:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_HELP', 'Erlaube die Verwendung von UBB Code?');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_CAPTION', 'Bild Unterst&uuml;tzung:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_HELP', 'Erlaube die Verwendung von Bildern  in Kommentaren?');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_CAPTION', 'Maximale Bild Breite:');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_HELP', 'Maximale Bild Breite in Pixeln');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_CAPTION', 'Erlaube Bewertung:');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_HELP', 'If set AND ajax mode is set : will display reactive image to allow to vote + or - for any comments.');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_CAPTION', 'Use names :');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_HELP', 'Use names rather than usernames (it concerns only registered users)');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_CAPTION', 'Aktiviere Profile:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_HELP', "Aktiviere die Verwendung von <a href='http://www.joomlapolis.com/' target='_blank'>Community Builder</a> - Profilen in Kommentaren?");
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_CAPTION', 'Aktiviere Avatare:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_HELP', "Erlaube die Benutzung von <a href='http://www.joomlapolis.com/' target='_blank'>Community Builder</a> - Avataren in den KOmmentaren? (nur wenn Profile aktiviert sind)");
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_CAPTION', 'Datums Format:');
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_HELP', 'Der Syntax ist identisch zu der PHP strftime() Funktion.');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_CAPTION', 'Deaktiviere Suchknopf');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_HELP', 'Deaktiviert den Suchknopf.');
/* IP ADDRESS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_IP_ADDRESS', 'IP Addresse'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_CAPTION', 'IP sichtbar:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_HELP', 'Falls ausgew&auml;hlt, wird die IP Adresse von unregistrierten Autoren ODER den ausgew&auml;hlten Benutzergruppen angezeigt.');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_CAPTION', 'Benutzergruppen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_HELP', 'Es muss mindestens eine Benutzergruppe ausgew&auml;hlt sein.'
							. '<br />Falls "IP sichtbar" auf Ja gestellt ist: wird nur angezeigt f&uuml;r Kommentare der ausgew&auml;hlten Benutzergruppen (Alle ist empfohlen).'
							. '<br />Falls "IP sichtbar" auf Nein gestellt ist: wird diese nur den ausgew&auml;hlten Benutzergruppe angezeigt'
							);
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_CAPTION', 'Teilweise:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_HELP', 'Falls aktiviert, wird die letzte Zahl, der IP des unregistrierten Benutzers nicht angezeigt');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_CAPTION', 'Titel:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_HELP', 'Beschreibung vor der IP Adresse');
/*
 * securityPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_SECURITY', 'Sicherheit'); 
/* BASICS SETTINGS */  
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_CAPTION', 'Nur registrierte Benutzer:');
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_HELP', 'Nur registrierte Benutzer k&ouml;nnen Kommentare schreiben.');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_CAPTION', 'Kommentare automatisch ver&ouml;ffentlichen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_HELP', 'If you set this to "no" then comments will be added to the database and will wait for you to review and publish them before showing.');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_CAPTION', 'Banlist:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_HELP', 'Geben Sie hier gesperrte IP-Adressen (Komma getrennt) ein, die keine Kommentare schreiben d&uuml;rfen.');
/* NOTIFICATIONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_NOTIFICATIONS', 'Benachrichtigung'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_CAPTION', 'Benachrichtige Admin (bitte nicht mehr benutzen):');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_HELP', 'Bitte nicht mehr benutzen - verwenden Sie die Moderator Benachrichtigen Einstellung');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_CAPTION', 'Admin\'s email:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_HELP', 'Mail notificationto which email address?');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_CAPTION', 'Moderatoren Benachrichtigen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_HELP', 'Benachrichtigen Sie die Moderatoren bei neuen Kommentaren?');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_CAPTION', 'Moderatoren Gruppen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_HELP', 'Moderatoren sind in der Lage online Kommenatare zu bearbeiten oder zu l&ouml;schen. Ein spezielles Men&uuml;, wird den Moderatoren f&uuml;r jeden Kommenatar angezeigt.');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_CAPTION', 'Aktiviere Benutzer Benachrichtigungen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_HELP', 'Falls aktiviert, werden Benutzer &uuml;ber neue Kommentare informiert.');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_CAPTION', 'Aktiviere Kommentarfeed (RSS):');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_HELP', '');
/* OVERFLOW */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_OVERFLOW', '&Uuml;berhang'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_CAPTION', 'Maximale Kommentarl&auml;nge:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_HELP', 'Maximale Anzahl an Zeichen in Kommentaren (-1 f&uuml;r kein Limit)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_CAPTION', 'Maximale Zeichenl&auml;nge pro Zeile:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_HELP', 'Maximale Zeichenl&auml;nge in einer Zeile (-1 f&uuml;r kein Limit)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_CAPTION', 'Maximale Wortl&auml;nge:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_HELP', 'Maximale Zeichenl&auml;nge in W&ouml;rter (-1 f&uuml;r kein Limit)');
/* ANTI-SPAM */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CAPTCHA', 'Anti-spam)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_CAPTION', 'Captcha aktiviert (empfohlen):');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_HELP', 'Der Benutzer muss eine zuf&auml;llige Zeichenfolge eingeben, bevor sein Kommenatar abgeschickt wird. Dies verhindert automatische Kommenatare auf Ihrer Seite.');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_CAPTION', 'Captcha Benutzergruppen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_HELP', 'Nur die ausgew&auml;hlten Benutzergruppen m&uuml;ssen den Sicherheitsschl&uuml;ssel eingeben');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_CAPTION', 'Webseiten Adresse nur f&uuml;r registrierte Benutzer:');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_HELP', 'Falls aktiviert wird nu bei registrierten Benutzern die Webseite angezeigt.');
/* CENSORSHIP */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CENSORSHIP', 'Zensurmodul'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_CAPTION', 'Akviert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_HELP', 'Akviere oder Deatkvier Zensur Filter. Der Zensur Filter wird die Regeln in der \"zensierten\" W&ouml;rter Liste benutzen um diese zu ver&auml;ndern oder zu verstecken');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_CAPTION', 'Klein-/Gro&szlig;schreibung:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_CAPTION', 'Zensierte W&ouml;rter:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_HELP', false); /* colspan */
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_CAPTION', 'Benutzergruppen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_HELP', 'Wird nur auf die ausgew&auml;hlten Benutzergruppen angewendet.');

/* MODIFIED IN 3.24 */ 
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_SECTIONS_CATEGORIES', 'Ids, Bereiche und Kategorie Kriterien'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_CAPTION', 'Ausgeschlossen / Eingeschlossen:');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_HELP', 'Falls EINGESCHLOSSEN, erlaubt dies Kommentare f&uuml;r Elemente (Artikel etc.) die: <u>Innerhalb der ausgew&auml;hlten IDs <b>ODER</b> IN den ausgew&auml;hlten Bereichen <b>ODER</b> IN den ausgw&auml;hlten Kategorien</u> sind.'
													.'<br />Falls AUSGESCHLOSSEN, erlaubt dies keine Kommentare in den Elementen die: <u>Innerhalb der ausgew&auml;hlten IDs <b>ODER</b> IN den ausgew&auml;hlten Bereichen <b>ODER</b> IN den ausgw&auml;hlten Kategorien</u> sind.');

/* NOT SURE IF YOU STILL NEED THIS, IN THE NEW ENGLISH TRANSLATION I DID NOT FIND IT */

JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CONTENT_ITEM', 'Inhaltselemente nach ID (BITTE NICHT MEHR BENUTZEN)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_CAPTION', 'Schlie&szlig;e folgende Inhalte aus (BITTE NICHT MEHR BENUTZEN):');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_HELP', 'BITTE NICHT MEHR BENUTZEN - benutzen Sie bitte den vorherigen Bereich f&uuml;r diese Einstellungen');

/* ADDED SINCE 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_CAPTION', 'Auszuschlie&szlig;ende/ Einzuschli&szlig;ende Elementen IDs:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_HELP', 'Sie k&ouml;nnen dies Feld benutzen um Inhalte aus- oder einzuschlie&szlig;en. <u>Format</u>: Liste getrennt mit Komma, ohne Leerzeichen.');
JOSC_define('_JOOMLACOMMENT_ADMIN_INCLUDE', 'Einschlie&szlig;en');
JOSC_define('_JOOMLACOMMENT_ADMIN_EXCLUDE', 'Ausschlie&szlig;en');

/* ADDED SINCE 3.25 */
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_importtable', 'Importiert von'); 

/* ADDED SINCE 4.0 */
/* AKISMET SUPPORT */
JOSC_define('_JOOMLACOMMENT_ADMIN_akismet_use', 'Aktivierung des Akismet Spam Schutzes');
JOSC_define('_JOOMLACOMMENT_ADMIN_akismet_HELP', 'Askimet ist ein Webservice der Ihnen dabei hilft Spam zu reduzieren. Weitere Informationen finden Sie auf <a href="http://www.akismet.com" target="_blank">akismet.com</a>');
JOSC_define('_JOOMLACOMMENT_ADMIN_akismet_key', 'Ihr Akismet Schl&uuml;ssel:');
JOSC_define('_JOOMLACOMMENT_ADMIN_akismet_key_HELP','Hier k&ouml;nnen einen kostenlosen pers&ouml;nlichen Schl&uuml;ssel bekommen:<a href="http://akismet.com/personal/" target="_blank">kostenloser pers&ouml;nlicher Schl&uuml;ssel</a> ');
/*GRAVATAR SUPPORT */
JOSC_define('_JOOMLACOMMENT_ADMIN_gravatar_CAPTION', 'Aktivieren der Gravatar Unterst&uuml;tzung:');
JOSC_define('_JOOMLACOMMENT_ADMIN_gravatar_HELP', 'Verwendung von <a href="http://gravatar.com" target="blank">Gravatar</a> - einem Avatar Webdienst');

/*disable comment form */
JOSC_define('_JOOMLACOMMENT_ADMIN_disable_additional_comments_CAPTION', 'Deaktivieren Sie zus&auml;tzliche Kommentare');
JOSC_define('_JOOMLACOMMENT_ADMIN_disable_additional_comments_HELP', 'Deaktivieren Sie die Komponente f&uuml;r die spezifische Inhalts-ID');

?>
