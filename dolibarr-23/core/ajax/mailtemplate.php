<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$templatefile = \DOL_DOCUMENT_ROOT . '/install/doctemplates/maillayout/' . \dol_sanitizeFileName(\GETPOST('template')) . '.html';
$content = \file_get_contents($templatefile);
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
$mycompanyaddress = $mysoc->getFullAddress(0, ',', 1, '');
$specificSubstitutionArray = array(
    '__TITLEOFMAILHOLDER__' => $langs->trans('TitleOfMailHolder'),
    '__CONTENTOFMAILHOLDER__' => $langs->trans("ContentOfMailHolder"),
    '__GRAY_RECTANGLE__' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAABkCAIAAABM5OhcAAABGklEQVR4nO3SwQ3AIBDAsNLJb3SWIEJC9gR5ZM3MB6f9twN4k7FIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIuEsUgYi4SxSBiLhLFIGIvEBtxYAkgpLmAeAAAAAElFTkSuQmCC',
    '__LAST_NEWS__' => $langs->trans('LastNews'),
    '__LIST_PRODUCTS___' => $langs->trans('ListProducts'),
    '__SUBJECT__' => \GETPOST('subject'),
    // vars for company
    '__MYCOMPANY_NAME__' => $mysoc->name,
    '__MYCOMPANY_ADDRESS__' => $mycompanyaddress,
    '__MYCOMPANY_EMAIL__' => $mysoc->email,
    '__MYCOMPANY_PHONE__' => $mysoc->phone,
    '__MYCOMPANY_PHONE_MOBILE__' => $mysoc->phone_mobile,
    '__MYCOMPANY_FAX__' => $mysoc->fax,
    '__MYCOMPANY_ADDRESS_WITH_PICTO__' => $mycompanyaddress ? '<img src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSJub25lIiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iNCIgdmlld0JveD0iMCAwIDI0IDI0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgogIDxwYXRoIGQ9Ik0xMiAyMmM1LjUyIDAgMTAtNC40OCAxMC0xMFMxNy41MiAyIDEyIDIgMiA2LjQ4IDIgMTJzNC40OCAxMCAxMCAxMHoiLz4KICA8Y2lyY2xlIGN4PSIxMiIgY3k9IjEyIiByPSIzIi8+Cjwvc3ZnPg==" style="height: 20px; width: 20px; display: inline-block; vertical-align: middle;"> ' . $mycompanyaddress : '',
    '__MYCOMPANY_EMAIL_WITH_PICTO__' => $mysoc->email ? '<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij4KICA8cmVjdCB4PSI0IiB5PSIxMiIgd2lkdGg9IjU2IiBoZWlnaHQ9IjQwIiByeD0iNCIgcnk9IjQiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLXdpZHRoPSI0Ii8+CiAgPHBvbHlsaW5lIHBvaW50cz0iNiwxNCAzMiwzNiA1OCwxNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+" style="height: 20px; width: 20px; display: inline-block; vertical-align: middle;"> ' . $mysoc->email : '',
    '__MYCOMPANY_PHONE_PRO_WITH_PICTO__' => $mysoc->phone ? '<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIj48IS0tIUZvbnQgQXdlc29tZSBGcmVlIHY3LjAuMCBieSBAYm9udGF3ZXNvbWUgLSBodHRwczovL2ZvbnRhd2Vzb21lLmNvbSBMaWNlbnNlIC0gaHR0cHM6Ly9mb250YXdlc29tZS5jb20vbGljZW5zZS9mcmVlIENvcHlyaWdodCAyMDI1IEZvbnRjb25zLCBJbmMuLS0+PHBhdGggZD0iTTE2MC4yIDI1QzE1Mi4zIDYuMSAxMzEuNy0zLjkgMTEyLjEgMS40bC01LjUgMS41Yy02NC42IDE3LjYtMTE5LjggODAuMi0xMDMuNyAxNTYuNCAzNy4xIDE3NSA3NC44IDMxMi43IDM0OS44IDM0OS44IDc2LjMgMTYuMiAxMzguOC0zOS4xIDE1Ni40LTEwMy43bDEuNS01LjVjNS40LTE5LjctNC43LTQwLjMtMjMuNS00OC4xbC05Ny4zLTQwLjVjLTE2LjUtNi45LTM1LjYtMi4xLTQ3IDExLjhsLTM4LjYgNDcuMkMyMzMuOSAzMzUuNCAxNzcuMyAyNzcgMTQ0LjggMjA1LjNMMTg5IDE2OS4zYzEzLjktMTEuMyAxOC42LTMwLjQgMTEuOC00N0wxNjAuMiAyNXoiLz48L3N2Zz4=" style="height: 20px; width: 20px; display: inline-block; vertical-align: middle;"> ' . $mysoc->phone : '',
);
$listsocialnetworks = '';
$content = \preg_replace_callback(
    '/__\\((.+)\\)__/',
    /**
     * @param 	array<int,string> $matches	Array of matches
     * @return 	string 						Translated string for the key
     */
    function ($matches) {
        global $langs;
        return $langs->trans($matches[1]);
    },
    $content
);
$template = \GETPOST('template', 'alpha');
// Get list of selected news or products
$selectedIdsStr = \GETPOST('selectedPosts', 'alpha');
//$selectedPosts = array();
$selectedIds = \json_decode($selectedIdsStr);