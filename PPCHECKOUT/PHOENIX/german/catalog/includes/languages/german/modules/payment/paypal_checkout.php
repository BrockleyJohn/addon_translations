<?php
/**
  Paypal Checkout
  Payment Module for Phoenix Cart
  Pay with Paypal, Paypal Credit and Cards via Paypal without leaving site

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

const MODULE_PAYMENT_PAYPAL_CHECKOUT_TEXT_TITLE = 'Paypal Checkout';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TEXT_PUBLIC_TITLE = 'Paypal Checkout';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TEXT_DESCRIPTION = '<div>Zahlungen mit Paypal Checkout abwickeln</div>';

const MODULE_PAYMENT_PAYPAL_CHECKOUT_CONFIG_ERROR = 'Das Paypal-Modul ist nicht richtig konfiguriert - bitte wählen Sie eine andere Zahlungsmethode';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CONN_ERROR = '<div class="alert-danger">Die Paypal API reagiert zu langsam. Bei Problemen wählen Sie bitte eine andere Zahlungsmethode</div>';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_INITIALISE_ERROR = 'Paypal Checkout konnte nicht initialisiert werden. Bitte versuchen Sie es erneut oder wählen Sie eine andere Zahlungsmethode';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ERROR_TITLE = 'Paypal Checkout Error';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_FAILURE = 'Ihre Zahlung konnte nicht mit Paypal abgwickelt werden.. Wenn das Problem weiterhin besteht, wählen Sie bitte eine andere Zahlungsmethode';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_APPLEPAY_CFG_ERROR = 'Entschuldigung, Apple Pay ist nicht richtig konfiguriert- wählen Sie bitte eine andere Zahlungsmethode';

const MODULE_PAYMENT_PAYPAL_CHECKOUT_MATC = 'Bitte akzeptieren Sie die Allgemeinen Geschäftsbedingungen, um fortzufahren.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DATA_MISS = 'Die Genehmigung von Paypal konnte nicht eingeholt werden';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_POSTING = '<br>Warten auf die Zahlungsabwicklung durch Paypal<br>Bitte warten Sie bis zu <span id="ppcountdown">%d</span> Sekunden';

const MODULE_PAYMENT_PAYPAL_CHECKOUT_GPAY_TOTAL = 'Gesamtbetrag';

// order statuses
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TRANSACTIONS_STATUS = 'Paypal [Transactions]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AUTHORISED_STATUS = 'autorisiert [Paypal]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DECLINED_STATUS = 'abgelehnt [Paypal]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_EXPIRED_STATUS = 'Auth abgelaufen[Paypal]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_VOIDED_STATUS = 'Zahlung üngültig[Paypal]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CHECK_STATUS = 'Zahlung überprüfen [Paypal]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CLEARING_STATUS = 'Clearing nötig[Paypal]';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUNDED_STATUS = 'Zahlung erstattet [Paypal]';

// order history texts
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MERCHANT_ID_VERIFIED = 'Händler ID erfolgreich bestätigt';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MERCHANT_ID_MISMATCH = 'Händler ID stimmt nicht überein';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AMOUNT = 'Zahlungsbetrag: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AMOUNT_NOT_MATCHED = 'Zahlung <> Gesamtsummer stimmt nicht überein';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TRANSACTION_ID = 'Transaktions ID : %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_STATUS = 'Zahlungsstatus : %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_SELLER_PROTECTION = 'Verkäuferschutz : %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_INFO = 'Zahlungsinformationen in den Verlauf geschrieben';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_AUTHORISED = 'Zahlung autorisiert';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_CAPTURED = 'Zahlung abgebucht';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_CAPTURE_DETAIL = 'Zahlung %s %s ohne Autorisierung erfolgt‘';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_CAPTURED_NOWT = 'Nichts abzubuchen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_CLEARING = 'Zahlung steht noch aus';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_DECLINED = 'Ihre Paypal-Zahlung wurde abgelehnt. Bitte versuchen Sie es erneut oder verwenden Sie eine andere Zahlungsmethode.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_VOIDED = 'Zahlung storniert';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_FAILED = 'Fehlgeschlagener Versuch, die Zahlung abzubuchen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_ERROR_CODE = 'HTTP status code %s - bei 500 oder mehr, nochmal versuchen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_VOID_FAILED = 'Fehlgeschlagener Versuch, die Zahlung zu stornieren';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AUTH_STATUS = 'Autorisierungsstatus : %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_STATUS = 'Abbuchungsstatus: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AUTH_AMOUNT = 'Autorisierter Betrag : %s %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AUTH_REMAIN = 'Erfasst %s übriger Betrag : %s %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_AMOUNT = 'Abzubuchender Betrag : %s %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_FINAL_CAPTURE_STATUS = 'insgesamt abzubuchender Betrag : %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_FINAL_CAPTURE_RELEASE = '<br>(freigeben <span id="relamt"></span> %s zurück zum Kunden)';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MULTIPLE_PAYMENTS_CAPTURES = 'Mehrere Zahlungen/Abbuchungen für diese Bestellung(außerhalb des Gestaltungsspielraums). Bitte manuell in Paypal überprüfen.‘';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PPO_TILT = 'Der Status der Paypal Zahlung kann nicht ermittelt werden. Bitte manuell in Paypal überprüfen.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_WEBHOOK_LOG = 'Webhook aufgerufen.
%s
Vorgang: %s
Zahlungsstatus: %s
Zahlungssumme: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_WEBHOOK_PREFIX_IGNORE = 'Benachrichtigung für Rechnung %s ohne Präfix %s ignorieren';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_WEBHOOK_ORDER_NF = 'Bestellung %s konnte nicht ermittelt werden';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_WEBHOOK_VOIDED = 'Kein Eintrag bei Paypal für %s - Transaktion vor Erfassung ungültig oder abgelaufen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_USING_ORDER_ID = "Bestellnummer '%s'";
const MODULE_PAYMENT_PAYPAL_CHECKOUT_USING_PPO_ID = " Zahlungsidentifikationsnummer '%s'";
const MODULE_PAYMENT_PAYPAL_CHECKOUT_IMBALANCE_DETAIL = "Paypal und Shop Beträge weichen voneinander ab:
Währung: %s
Rechungsbetrag: %s
Warenwert: %s
Versandkosten: %s
Steuer: %s (info) %s (Gesamtbetrag)

summierter Shop Rabatt: %s
summierte Shop Bearbeitungsgebühren: %s
Gesamtbetrag (Rabatt & Gebühren): %s

Paypal Gesamtbetrag: %s
Paypal Warenwert: %s
Paypal Versandkosten: %s
Paypal Steuer: %s

Paypal Artikel: %s";
const MODULE_PAYMENT_PAYPAL_CHECKOUT_IMBALANCE_ADJUSTED = " Paypal und Shop Beträge wurden angeglichen - bitte prüfen";
const MODULE_PAYMENT_PAYPAL_CHECKOUT_IMBALANCE_NOT_ADJUSTED = "Paypal und Shop Beträge nicht angeglichen - Checkout nicht möglich";

// paypal payment status messaging
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PPO_STATUS = [
  'NOT_FOUND' => 'Kein Eintrag bei Paypal für %s - Transaktion vor Buchung ungültig oder abgelaufen',
  'VOIDED' => 'Transaktion üngültig',
  'APPROVED' => 'Zahlung vom Käufer genehmigt. Dies bedeutet wahrscheinlich, dass beim Bezahlvorgang ein Fehler aufgetreten ist - Versuchen Sie die Autorisierung/Buchung innerhalb von 6 Stunden erneut.',
  'AUTHORIZED' => 'Die Zahlung ist autorisiert und bis zu 30 Tage lang zur Buchung verfügbar.',
  'PART_CAPTURED' => 'Es wurde nicht der volle Betrag der Autorisierung abgebucht und die Zahlung nicht als endgültige Abbuchung markiert.',
  'CAPTURED' => 'Zahlung wurde abgebucht.',
  'PART_REFUNDED' => 'Die Zahlung wurde teilweise zurückerstattet.',
  'REFUNDED' => 'Die Zahlung wurde komplett zurückerstattet.',
  'TILT' => 'Der Status der Zahlung kann nicht ermittelt werden; Mehrfachgenehmigungen und Mehrfachkäufe liegen außerhalb des Gestaltungsspielraums.',
];

// admin messaging
const MODULE_PAYMENT_PAYPAL_CHECKOUT_APP_CONFIG_ADMIN_ERROR = '<div class="alert alert-danger">Das Modul wird erst geladen, wenn die Haupteinstellungen für die App konfiguriert sind. <a href="%s"><button class="btn btn-danger">Einstellungen</button></a></div>';

// admin api test
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_LINK_TITLE = 'Paypal Checkout-Verbindungstest';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_GENERAL_TEXT = 'Testen der Verbindung zu Paypal Checkout...';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_TITLE = 'Paypal Checkout-Verbindungstest';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_BUTTON_CLOSE = 'schließen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_SUCCESS = 'Erfolgreich verbunden - mit Konto: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_FAILED = 'Verbindung nicht möglich - Bitte überprüfen Sie die allgemeinen Einstellungen: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DIALOG_CONNECTION_ERROR = 'Paypal hat mit einem Fehler geantwortet [%s] - Bitte überprüfen Sie die allgemeinen Einstellungen: %s';
// admin orders dialogs
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUND_TITLE = 'Zahlung zurückerstatten';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUND_BODY = 'Senden Sie eine Rückerstattung von %s - bestätigen: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUND_BTN = 'Erstattung';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUND_CLOSE = 'schließen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_PAYMENT_REFUNDED = 'Zahlung zurückerstattet';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_TITLE = 'Zahlung abbuchen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_BODY = 'Höhe der Abbuchung  %s <br>Gesamtbetrag: %s';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_BTN = 'Abbuchen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CAPTURE_CLOSE = 'schließen';

// admin config texts
const MODULE_PAYMENT_PAYPAL_CHECKOUT_STATUS_TITLE = 'aktiviere Paypal Checkout';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_STATUS_DESC = 'Möchten Sie Zahlungen mit dem Modul akzeptieren?';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TRANSACTION_METHOD_TITLE = 'Transaktionsmethode';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TRANSACTION_METHOD_DESC = 'Zahlungen sofort buchen oder oder eine Genehmigung zur späteren Zahlung erteilen? NB Genehmigungen sind max 3 Tage gültig';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_PAYLATER_TITLE = 'Paylater abieten';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_PAYLATER_DESC = 'Paylater hinzufügen (in Raten zahlen) als Option und Nachrichten';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_CARDS_TITLE = 'Card Button anzeigen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_CARDS_DESC = 'Card button bei Zahlung ohne Konto anzeigen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_VENMO_TITLE = 'Venmo anbieten';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_VENMO_DESC = 'Venmo anbieten(nur in den USA verfügbar)';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_APPLEPAY_TITLE = 'Apple Pay anbiten';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_APPLEPAY_DESC = 'Damit dies funktioniert, sind zahlreiche manuelle Einstellungen erforderlich. - siehe Benutzerhandbuch';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_GOOGLEPAY_TITLE = 'Google Pay anbieten';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OFFER_GOOGLEPAY_DESC = 'Überprüfen Sie vor dem Einschalten, ob Google Pay bei Paypal aktiviert ist – siehe Benutzerhandbuch';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ALLOW_INSTANT_ONLY_TITLE = 'Nur Sofortzahlungen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ALLOW_INSTANT_ONLY_DESC = 'Verhindert, dass Leute mit elektronischen Schecks usw. bezahlen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CHECK_PROTECTION_TITLE = 'Verkäuferschutz prüfen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CHECK_PROTECTION_DESC = 'Wenn ausgwählt, wird die Berechtigung zum Verkäuferschutz geprüft und der Bestellstatus auf den Prüfstatus gesetzt, falls die Bestellung nicht berechtigt ist.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_BRAND_OVERRIDE_TITLE = 'Paypal Marke überschreiben';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_BRAND_OVERRIDE_DESC = 'Legen Sie ein Markenlabel fest, das den PayPal-Firmennamen überschreibt, sodass Kunden die Transaktion leichter erkennen können.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ORDER_PREFIX_TITLE = 'Rechnungspräfix';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ORDER_PREFIX_DESC = 'Wenn Sie mehr als einen Shop mit einer einzigen Paypal-App verknüpfen, verwenden Sie dies, um Fehler durch doppelte IDs zu vermeiden - muss für jeden Shop eindeutig sein. Wird durch einen Bindestrich ergänzt. Andernfalls leer lassen. Wenn Sie dies ändern, kann es sein, dass der Webhook bestehende Bestellungen ignoriert.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ORDER_STATUS_ID_TITLE = 'Bestellstatus festlegen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ORDER_STATUS_ID_DESC = 'Setzen Sie den Status der mit diesem Zahlungsmodul getätigten Bestellungen auf diesen Wert';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TRANSACTIONS_ORDER_STATUS_ID_TITLE = 'Transaktions Auftragsstatus';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_TRANSACTIONS_ORDER_STATUS_ID_DESC = 'Transaktionsinformationen in dieser Bestellstatusebene einschließen.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AUTHORISED_ORDER_STATUS_ID_TITLE = 'Autorisierter Zahlungsstatus';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_AUTHORISED_ORDER_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die Zahlung genehmigt, aber nicht gebucht wurde.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_EXPIRED_ORDER_STATUS_ID_TITLE = 'Abgelaufener Autorisierungsstatus';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_EXPIRED_ORDER_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die Zahlungsautorisierung abgelaufen ist.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DECLINED_ORDER_STATUS_ID_TITLE = 'Abgelehnter Status';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DECLINED_ORDER_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die Zahlung abgelehnt wird.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_VOIDED_ORDER_STATUS_ID_TITLE = 'Status ungültige Transaktion';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_VOIDED_ORDER_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die Zahlungsautorisierung ungültig wird.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CHECK_ORDER_STATUS_ID_TITLE = 'Zahlungsstatus manuell prüfen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CHECK_ORDER_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die automatische Zahlungsprüfung fehlschlägt.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CLEARING_ORDER_STATUS_ID_TITLE = 'Status Zahlung wartet auf Freigabe';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CLEARING_ORDER_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die Zahlung freigegebenm werden muss(z.B. eCheques).';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUNDED_STATUS_ID_TITLE = 'Status der erstatteten Zahlung';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_REFUNDED_STATUS_ID_DESC = 'Setzen Sie die Bestellung auf diesen Status, wenn die Zahlung über Paypal zurückerstattet wird.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ZONE_TITLE = 'Zahlungszone';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ZONE_DESC = 'Wenn eine Zone ausgewählt ist, aktivieren Sie diese Zahlungsmethode nur für diese Zone.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CONFIRMATION_CLASS_TITLE = 'Bestätigungstaste';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_CONFIRMATION_CLASS_DESC = 'Klasse der Schaltfläche „Senden“ im Bestellbestätigungsformular - WICHTIG: Wenn Sie die Standardeinstellung btn-success geändert haben, für eine andere Farbe (z.B. btn-primary) bitte hier ändern';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MATC_ID_TITLE = 'MATC Id';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MATC_ID_DESC = 'ID des zu aktivierenden Felds, um den Allgemeinen Geschäftsbedingungen zuzustimmen. Wenn Sie es nicht verwenden, es spielt keine Rolle, aber leeren Sie das Feld nicht, da sonst möglicherweise ein Fehler auftritt. WICHTIG: Überprüfen Sie, ob der Käufer gezwungen ist, das Kästchen anzukreuzen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OT_CHARGES_TITLE = 'Gesamtkosten der Bestellung';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OT_CHARGES_DESC = 'Zusätzliche Bestellsummenmodule werden als Rabatte betrachtet und bei der Übermittlung an PayPal als solche behandelt. Hier erfolgt die Auflistung aller zu behandelnden Gebühren, getrennt durch Semikolon.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OT_PRODUCT_SUBTOTAL_DISCOUNTS_TITLE = 'Zwischensumme Rabatt Module';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OT_PRODUCT_SUBTOTAL_DISCOUNTS_DESC = 'Die meisten Rabattmodule werden nach der Berechnung des Produktzwischenbetrags angewendet und dies ist die Standardeinstellung in den Modulberechnungen. Dies ist eine durch Semikolon getrennte Liste aller Elemente, die den im Shop angezeigten Zwischensummenbetrag der Produkte reduzieren.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OVERRIDE_TOTALS_TITLE = 'Summen überschreiben';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OVERRIDE_TOTALS_DESC = 'Diese Einstellung überschreibt die vom Shop angezeigten Gesamtsummen und verwendet stattdessen berechnete Werte. Verwenden Sie dies nur, wenn Rundungsfehler auftreten.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OVERRIDE_LIMITS_TITLE = 'Limits übergehen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OVERRIDE_LIMITS_DESC = 'Legen Sie Limits für die Differenz der Gesamtsummen fest, die überschrieben werden. Dies wird in der Währung der Bestellung berechnet.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OVERRIDE_EMAIL_TITLE = 'E-Mails übergehen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_OVERRIDE_EMAIL_DESC = 'Senden Sie eine E-Mail an die Debug-E-Mail-Adresse, wenn Gesamtsummen überschrieben werden. Schalten Sie dies nur aus, wenn Sie sicher sind, dass alle Module korrekt gehandhabt werden.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ORDER_CREATE_BYPASS_TITLE = 'Modul Auftragserstellung umgehen';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_ORDER_CREATE_BYPASS_DESC = 'Wenn der Wert auf True gesetzt ist, wird die PayPal-Bestellung möglicherweise nicht mit der Site-Bestell-ID aktualisiert. <a href="https://cartmart.uk/-p-9.html">Siehe Benutzerhandbuch</a>';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_SDK_DEBUG_TITLE = 'Paypal SDK Debug';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_SDK_DEBUG_DESC = 'Aktivieren Sie das Debuggen, wenn Sie das SDK verwenden - nicht für Live Shops!!';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DEBUG_LOGGING_TITLE = 'Debug Logging';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DEBUG_LOGGING_DESC = 'Debugprotokoll an Fehlerprotokolldatei senden (nicht anlassen, es wird riesig)';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DEBUG_EMAIL_TITLE = 'Debug E-Mail Addresse';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_DEBUG_EMAIL_DESC = 'An diese E-Mail-Adresse (sofern eine solche angegeben ist) werden sämtliche Parameter einer ungültigen Transaktion gesendet.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_SORT_ORDER_TITLE = 'Sortierreihenfolge der Anzeige.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_SORT_ORDER_DESC = 'Sortierreihenfolge der Anzeige. Das Niedrigste wird zuerst angezeigt.';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MODEL_VERSION_TITLE = 'Installierte Version';
const MODULE_PAYMENT_PAYPAL_CHECKOUT_MODEL_VERSION_DESC = 'Als Referenz, automatisch aktualisiert';
