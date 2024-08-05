<?php
/**
  Paypal Integration for Phoenix Cart
  Main App Configuration

  Version 1.0

  author: John Ferguson @BrockleyJohn phoenix@cartmart.uk
  More Phoenix addons at https://cartmart.uk

  Module for CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

* Copyright (c) 2022 SE Websites
*
* Released under commercial Licence without warranty express or implied
*
*****************************************************************/

const MODULE_CARTMART_PAYPAL_TITLE = 'Paypal Integration allgemein';
const MODULE_CARTMART_PAYPAL_DESCRIPTION = 'Einstellungen für die REST APIs';

const MODULE_CARTMART_PAYPAL_ERROR_ENVT_SETTINGS_INCOMPLETE = 'Einstellungen für %s sind unvollständig';
const MODULE_CARTMART_PAYPAL_ERROR_ADMIN_SSL = 'Das Modul funktioniert nicht ohne SSL';

// admin api test
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_LINK_TITLE = 'Paypal API Verbindungs Test';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_GENERAL_TEXT = 'Verbindung zu Paypal testen...';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_TITLE = 'Paypal API Verbindungs Tes';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_BUTTON_CLOSE = 'schließen';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_SUCCESS = 'Erfolgreich verbunden mit: %s';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_RUN_ERROR = 'Der Test konnte nicht ausgeführt werden. Bitte überprüfen Sie Ihre Installation.';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_FAILED = 'Fehlgeschlagen! Bitte überprüfen Sie die Einstellungen und versuchen Sie es erneut.';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_ERROR = 'Die Paypal API hat geantwortet, aber diesen Fehler zurückgegeben: %s';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_MODE_LIVE = 'Live';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_MODE_TEST = 'Test';
const MODULE_CARTMART_PAYPAL_DIALOG_CONNECTION_TIME = 'Verbindungszeit:';

// admin webhook checks
const MODULE_CARTMART_PAYPAL_AUTO_SET = 'automatisch einstellen';
const MODULE_CARTMART_PAYPAL_WEBHOOK_INFO = '<br/>Webhook : %s';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_TITLE = 'Paypal API Hook';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_REGISTERING_TEXT = 'Webhook bei Paypal registrieren...';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_REREGISTERING_TEXT = 'Webhook erneut bei Paypal registrieren...';
const MODULE_CARTMART_PAYPAL_WEBHOOK_URL_MISMATCH = 'Die Webhook-URL passt nicht zu diesem Shop';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_DEREGISTERING_TEXT = 'Webhook bei Paypal abmelden...';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_REGISTER = 'Webhook registrieren';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_REREGISTER = 'Webhook erneut registrieren';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_DEREGISTER = 'Webhook abmelden';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_ALREADY_REGISTERED = 'bereits vorhandener Webhook %s im Shop für %s Umgebung übernommen';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_REGISTERED = 'webhook %s erfolgreich für %s Umgebung registriert';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_DEREGISTERED = 'webhook %s erfolgreich von %s Umgebung abgemeldet';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_RUN_ERROR = 'Der Test konnte nicht ausgeführt werden. Bitte überprüfen Sie Ihre Installation.';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_FAILED = 'Fehlgeschlagen! Bitte überprüfen Sie die Einstellungen und versuchen Sie es erneut.';
const MODULE_CARTMART_PAYPAL_DIALOG_WEBHOOK_ERROR = 'Der Webhook Aufruf hat diesen Fehler zurückgegeben: %s';
const MODULE_CARTMART_PAYPAL_WEBHOOK_DISPLAY = 'Webhook id: %s<br/>Url: %s<br/>';
const MODULE_CARTMART_PAYPAL_WEBHOOK_EVENT = 'Vorgang: %s<br/>';
const MODULE_CARTMART_PAYPAL_WEBHOOK_INVALID = 'Webhook id %s ungültig';

// admin api diagnosis
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_LINK_TITLE = 'Paypal API Verbindungsdiagnose';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_GENERAL_TEXT = 'Diagnose der Verbindung zu Paypal...';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_TITLE = 'Paypal API Verbindungsdiagnose';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_BUTTON_CLOSE = 'schließen';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_DNS = 'DNS Überprüfung für: %s <br/><pre>%s</pre>';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_DNS_FAIL = 'DNS Überprüfung für %s fehlgeschlagen';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_FAIL = 'Diagnosefehler %s';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_SSL = 'SSL Überprüfung für: %s <br/><pre>%s</pre>';
const MODULE_CARTMART_PAYPAL_DIALOG_DIAGNOSIS_SSL_FAIL = 'DNS Überprüfung für %s fehlgeschlagen';

// admin config texts
const MODULE_CARTMART_PAYPAL_STATUS_TITLE = 'Paypal Apps aktivieren';
const MODULE_CARTMART_PAYPAL_STATUS_DESC = 'REST-basierte Module von Paypal verwenden?';
const MODULE_CARTMART_PAYPAL_TRANSACTION_SERVER_TITLE = 'Transaktionsserver';
const MODULE_CARTMART_PAYPAL_TRANSACTION_SERVER_DESC = 'Transaktionen an die Live- oder Sandbox-PayPal-Umgebung senden?';
const MODULE_CARTMART_PAYPAL_LIVE_CLIENT_ID_TITLE = 'Client ID (Live)';
const MODULE_CARTMART_PAYPAL_LIVE_CLIENT_ID_DESC = 'Client ID für die Paypal Live Umgebung';
const MODULE_CARTMART_PAYPAL_LIVE_SECRET_TITLE = 'Secret (Live)';
const MODULE_CARTMART_PAYPAL_LIVE_SECRET_DESC = 'Secret für die Paypal Live Umgebung';
const MODULE_CARTMART_PAYPAL_LIVE_MERCHANT_ID_TITLE = 'Händler ID (Live)';
const MODULE_CARTMART_PAYPAL_LIVE_MERCHANT_ID_DESC = 'Händler ID für die Paypal Live Umgebung - wird zur Validierung verwendet, falls festgelegt';
const MODULE_CARTMART_PAYPAL_LIVE_WEBHOOK_ID_TITLE = 'Webhook ID (Live)';
const MODULE_CARTMART_PAYPAL_LIVE_WEBHOOK_ID_DESC = 'Webhook ID für die Paypal Live Umgebung';
const MODULE_CARTMART_PAYPAL_SANDBOX_CLIENT_ID_TITLE = 'Client ID (Sandbox)';
const MODULE_CARTMART_PAYPAL_SANDBOX_CLIENT_ID_DESC = 'Client ID für die Paypal Sandbox Umgebung';
const MODULE_CARTMART_PAYPAL_SANDBOX_SECRET_TITLE = 'Secret (Sandbox)';
const MODULE_CARTMART_PAYPAL_SANDBOX_SECRET_DESC = 'Secret für die Paypal Sandbox Umgebung';
const MODULE_CARTMART_PAYPAL_SANDBOX_MERCHANT_ID_TITLE = 'Händler ID (Sandbox)';
const MODULE_CARTMART_PAYPAL_SANDBOX_MERCHANT_ID_DESC = 'Händler ID für die Paypal Sandbox Umgebung - wird zur Validierung verwendet, falls festgelegt';
const MODULE_CARTMART_PAYPAL_SANDBOX_WEBHOOK_ID_TITLE = 'Webhook ID (Sandbox)';
const MODULE_CARTMART_PAYPAL_SANDBOX_WEBHOOK_ID_DESC = 'Webhook ID für die Paypal Sandbox Umgebung';
const MODULE_CARTMART_PAYPAL_API_REQ_TIMEOUT_TITLE = 'Zeitüberschreitung bei Paypal API Anforderungen';
const MODULE_CARTMART_PAYPAL_API_REQ_TIMEOUT_DESC = 'Zeitüberschreitungslimit für Paypal API Anforderungen in Sekunden';
const MODULE_CARTMART_PAYPAL_TOKEN_REQ_TIMEOUT_TITLE = 'Zeitüberschreitung bei der Anforderung eines Paypal Tokens';
const MODULE_CARTMART_PAYPAL_TOKEN_REQ_TIMEOUT_DESC = 'Zeitüberschreitungslimit für Paypal Token Anforderungen in Sekunden';
const MODULE_CARTMART_PAYPAL_TEST_REQ_TIMEOUT_TITLE = 'Zeitüberschreitung bei Paypal Test Anforderungen';
const MODULE_CARTMART_PAYPAL_TEST_REQ_TIMEOUT_DESC = 'Zeitüberschreitungslimit für Paypal Test Anforderungen in Sekunden. Wenn die PayPal-API langsam/nicht verfügbar ist, Die Zahlungsseite zur Kasse wird um diese Zeit verzögert.';
const MODULE_CARTMART_PAYPAL_TOKEN_TITLE = 'Paypal Access Token';
const MODULE_CARTMART_PAYPAL_TOKEN_DESC = 'Das access token wird in einer Konfigurationsvariable gespeichert - wird automatisch erledigt.';
const MODULE_CARTMART_PAYPAL_DEBUG_TITLE = 'Debug Logging';
const MODULE_CARTMART_PAYPAL_DEBUG_DESC = 'Aktivieren Sie die Debug-Protokollierung, wenn Ihre API-Aufrufe fehlschlagen. Nicht eingeschaltet lassen !';

// admin orders texts
const MODULE_CARTMART_PAYPAL_TAB_TITLE = '<i class="fab fa-paypal"></i> Paypal';
const MODULE_CARTMART_PAYPAL_INFO_BTN = 'Transaktionsinfo';
const MODULE_CARTMART_PAYPAL_VOID_BTN = 'Stornierte Transaktion';
const MODULE_CARTMART_PAYPAL_CAPTURE_BTN = 'Zahlung abbuchen';
const MODULE_CARTMART_PAYPAL_REFUND_BTN = 'Zahlung erstatten';
const MODULE_CARTMART_PAYPAL_PP_VIEW_BTN = 'in Paypal ansehen';

const MODULE_CARTMART_PAYPAL_VOID = 'stornieren'; 
const MODULE_CARTMART_PAYPAL_CAPTURE = 'abbuchen'; 
const MODULE_CARTMART_PAYPAL_REFUND = 'erstatten'; 

const MODULE_CARTMART_PAYPAL_ERROR_CANT_PROCESS = 'Es fehlen die notwendigen Daten für die Schnittstelle - bitte im Paypal-Konto prüfen';
const MODULE_CARTMART_PAYPAL_METHOD_STATUS_ERROR = 'Nicht möglich %s da die Zahlung den Status %s hat';

const MODULE_CARTMART_PAYPAL_ERROR_ORDER_NOT_FOUND = 'Paypal Transaktion konnte mit gespeicherter ID nicht abgerufen werden \'%s\' - bitte im Paypal-Konto prüfen';

const PAYPAL_REST_API_UNEXPECTED_HTTP_CODE = 'Unerwartete Rückmeldung %s mit %s %s %s';

// paypal message overrides if required, e.g. below
const PAYPAL_REST_API_ERROR_LOOKUP = [
  'CAPTURE_FULLY_REFUNDED' => 'Die Zahlung für diese Bestellung wurde bereits zurückerstattet',
];