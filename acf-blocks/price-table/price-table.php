<?php

/**
 * Textbox Block Template.
 * Currently for Geomap & TPQ
 * Change 7/March/24: Deactive yearly pricing for TPQ only including switch month/year
 * Attention: There are seperate HTML Markups for Mobile & Desktop
 *
 */


// Common definition of $anchor, $module_classes, $container_classes
require (get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "price-table");
array_unshift($container_classes, "container");

$option = get_field('block::price-table:option');

?>
<!-- TPQ Price Table starts-->
<?php if ($option == 'tpq'): ?>
<div <?php echo $anchor; ?> class="notoggle tpq <?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">
        <!-- <div class="price-toggle-wrapper fs--medium">
        <span>monatlich <span class="tiny-screen-hide">zahlen</span></span>
        <div class="toggle-btn">
          <label class="switch">
            <input type="checkbox" id="price-toggle" />
            <span class="slider round"></span>
          </label>
        </div>
        <span class="checked">jährlich <span class="tiny-screen-hide">zahlen</span>
        </span>
      </div> -->
        <!-- ----------------------------------------------------------------------------------- -->
        <!-- Desktop Price table starts-->
        <!-- ------------------------------------------------------------------------------------- -->
        <p><span class="please-note">Preise pro Monat bei jährlicher Zahlung (zzgl. 19% Mehrwertsteuer)</span></p>
        <div class="block-wrapper grid12">
            <div class="block block--label grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="feature-label">Features</div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>Anzahl Nutzer
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit jedem Paket bekommen Sie eine unbegrenzte Anzahl an Nutzeraccounts für alle
                                    Module, außer bei der Immobilienberechnung.
                                </div>
                            </li>
                            <li>Verkauf
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit dem Modul Verkauf haben Sie alle erforderlichen Verkaufsdaten auf einen Blick.
                                    Nutzen Sie das Online-Reservierungs- und Verkaufsmanagement in Echtzeit für alle
                                    Beteiligten im Immobilienvertrieb.
                                </div>
                            </li>
                            <li>Kontakte
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit dem Modul Kontakte verwalten Sie Kundendaten effizient: Adressen, Notizen,
                                    Wiedervorlagen, Termine und Dateien werden im Kontaktmanagement entsprechend
                                    zugeordnet.
                                </div>
                            </li>
                            <li>Vertrieb
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit dem Vertriebsportal können Sie Ihre Angebote schnell und einfach im Internet
                                    präsentieren - inkl. internem Vertriebsbereich, passend zu Ihrer Corporate Identity.
                                </div>
                            </li>
                            <li>Dateien
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Das Modul Dateien ermöglicht das Speichern von Dateien auf der
                                    TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt
                                    online zur Verfügung – weltweit und jederzeit.
                                </div>
                            </li>
                            <li>Speicherplatz
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit jedem Paket bekommen Sie den jeweils angegebenen Speicherplatz. Zusätzlicher
                                    Speicher kann jederzeit hinzugebucht werden.
                                </div>
                            </li>
                            <li>Immobilienberechnungen
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit dem Modul Berechnungen erstellen Sie überzeugende Immobilienberechnungen für das
                                    Investment Ihrer Kunden - inkl. automatischer Aktualisierung rechtlicher
                                    Rahmenbedingungen.
                                </div>
                            </li>
                            <li>Provision
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit dem Modul Provision erstellen Sie qualifizierte und digitale
                                    Provisionsabrechnungen an den Auftraggeber oder die eigenen Vermittler.
                                </div>
                            </li>
                            <li>Dashboard
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Das Modul Dashboard ermöglicht Ihnen den stets klaren Überblick über aktuelle
                                    Verkaufs- und Reservierungsstände durch übersichtliche Diagramme.
                                </div>
                            </li>
                            <li>Vermietung
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Das Modul Vermietung bietet ein effizientes Reservierungs- und Vertragsmanagement
                                    für Erst- und Folgevermietungen mit Echtzeit-Übersicht über vermietete, reservierte
                                    und freie Einheiten.
                                </div>
                            </li>
                            <li>Mängelmanagement
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Mit dem Mängelmanagement erfassen Sie Mängel, binden Gewerke ein und setzen Fristen.
                                    Alle Änderungen werden dabei lückenlos im Verlaufsprotokoll dokumentiert.
                                </div>
                            </li>
                            <li>Support<i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Erleben Sie erstklassigen Support! Unser Team steht Ihnen jederzeit per E-Mail
                                    und/oder per Telefon zur Seite, um Ihre Fragen zu beantworten und Probleme zu lösen.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <span class="btn placeholder"></span>
                </div>
            </div>
            <div class="block block--item grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="category">Economy Class</div>
                        <div class="price price-monthly">169 €</div>
                        <!-- <div class="price price-yearly">1.690 €</div> -->
                        <div class="interval">pro Monat</div>

                    </div>
                    <div class="feature">
                        <ul>
                            <li>unbegrenzt</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>5 GB</li>
                            <li>1 Nutzer</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>E-Mail</li>
                        </ul>
                    </div>
                    <a href="/produkte/arbeitsplattform/jetzt-testen/" class="btn btn--empty">Jetzt testen</a>
                </div>
            </div>
            <div class="block block--item highlight grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="category">Business Class</div>
                        <div class="price price-monthly">329 €</div>
                        <!-- <div class="price price-yearly">3.290 €</div> -->
                        <div class="interval">pro Monat</div>

                    </div>
                    <div class="feature">
                        <ul>
                            <li>unbegrenzt</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>&nbsp;</li>
                            <li>10 GB</li>
                            <li>20 Nutzer</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>E-Mail & Telefon</li>
                        </ul>
                    </div>
                    <a href="/produkte/arbeitsplattform/jetzt-testen/" class="btn btn--fill">Jetzt testen</a>
                </div>
            </div>
            <div class="block block--item  grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="category">First Class</div>
                        <div class="price price-monthly">699 €</div>
                        <!-- <div class="price price-yearly">6.990 €</div> -->
                        <div class="interval">pro Monat</div>

                    </div>
                    <div class="feature">
                        <ul>
                            <li>unbegrenzt</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>20 GB</li>
                            <li>50 Nutzer</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>E-Mail & Telefon</li>
                        </ul>
                    </div>
                    <a href="/produkte/arbeitsplattform/jetzt-testen/" class="btn btn--empty">Jetzt testen</a>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------------------------------------------- -->
        <!-- Mobile Price table TeamProQ starts-->
        <!-- -------------------------------------------------------------------------------------- -->
        <div class="block-wrapper block-wrapper-mobile">
            <div class="block block--item">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Economy Class</div>
                        <div class="price price-monthly">169 €</div>
                        <!-- <div class="price price-yearly">1.690 €</div> -->
                        <div class="interval">pro Monat</div>

                    </div>
                    <div class="feature">
                        <div class="feature-content">
                            inklusive der Module <br>
                            <span class="text-bold">
                                Verkauf<br>
                                Kontakte<br>
                            </span>
                            <div>
                                <span class="text-bold">Speicher:</span><br>5 GB
                            </div>
                            <div>
                                <span class="text-bold">Immobilienberechnung:</span><br>1 Nutzer
                            </div>
                            <div>
                                <span class="text-bold">Support:</span><br>E-Mail
                            </div>
                        </div>
                        <div class="feature-toggle">
                            <span class="feature-toggle--open">
                                alle Features anzeigen <i class="fa-regular fa-chevron-down"></i>
                            </span>
                            <span class="feature-toggle--close">
                                alle Features verbergen <i class="fa-regular fa-chevron-up"></i>
                            </span>
                        </div>
                    </div>
                    <a href="/produkte/arbeitsplattform/jetzt-testen/">
                        <div class="btn btn--empty">Jetzt testen</div>
                    </a>
                </div>
            </div>
            <div class="block block--item highlight">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Business Class</div>
                        <div class="price price-monthly">329 €</div>
                        <!-- <div class="price price-yearly">3.290 €</div> -->
                        <div class="interval">pro Monat</div>

                    </div>
                    <div class="feature">
                        <div class="feature-content">
                            inklusive der Module <br>
                            <span class="text-bold">
                                Verkauf<br>
                                Kontakte<br>
                                Vertrieb<br>
                            </span>
                            <div>
                                <span class="text-bold">Speicher:</span><br>10 GB
                            </div>
                            <div>
                                <span class="text-bold">Immobilienberechnung:</span><br>20 Nutzer
                            </div>
                            <div>
                                <span class="text-bold">Support:</span><br>E-Mail & Telefon
                            </div>
                        </div>
                        <div class="feature-toggle">
                            <span class="feature-toggle--open">
                                alle Features anzeigen <i class="fa-regular fa-chevron-down"></i>
                            </span>
                            <span class="feature-toggle--close">
                                alle Features verbergen <i class="fa-regular fa-chevron-up"></i>
                            </span>
                        </div>
                    </div>
                    <a href="/produkte/arbeitsplattform/jetzt-testen/">
                        <div class="btn btn--fill">Jetzt testen</div>
                    </a>
                </div>
            </div>
            <div class="block block--item">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">First Class</div>
                        <div class="price price-monthly">699 €</div>
                        <!-- <div class="price price-yearly">6.990 €</div> -->
                        <div class="interval">pro Monat</div>
                    </div>
                    <div class="feature">
                        <div class="feature-content">
                            inklusive der Module <br>
                            <span class="text-bold">
                                Verkauf<br>
                                Kontakte<br>
                                Vertrieb<br>
                                Dateien<br>
                                Provision<br>
                                Dashboard<br>
                            </span>
                            <div>
                                <span class="text-bold">Speicher:</span><br>20 GB
                            </div>
                            <div>
                                <span class="text-bold">Immobilienberechnung:</span><br>50 Nutzer
                            </div>
                            <div>
                                <span class="text-bold">Support:</span><br>E-Mail & Telefon
                            </div>
                        </div>
                        <div class="feature-toggle">
                            <span class="feature-toggle--open">
                                alle Features anzeigen <i class="fa-regular fa-chevron-down"></i>
                            </span>
                            <span class="feature-toggle--close">
                                alle Features verbergen <i class="fa-regular fa-chevron-up"></i>
                            </span>
                        </div>
                    </div>
                    <a href="/produkte/arbeitsplattform/jetzt-testen/">
                        <div class="btn btn--empty">Jetzt testen</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------- -->
<!-- TeamProQ Ends -->
<!-- ------------------------------------------------------------------------------------ -->
<!-- Geomap Start -->
<!-- ------------------------------------------------------------------------------------------- -->
<?php elseif ($option == 'geomap'): ?>
<div <?php echo $anchor; ?> class="toggle geomap <?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">
        <div class="price-toggle-wrapper fs--medium">
            <span>monatlich <span class="tiny-screen-hide">zahlen</span></span>
            <div class="toggle-btn">
                <label class="switch">
                    <input type="checkbox" id="price-toggle" />
                    <span class="slider round"></span>
                </label>
            </div>
            <span class="checked">jährlich <span class="tiny-screen-hide">zahlen</span>
            </span>
        </div>
        <!-- ------------------------------------------------------------------------------------ -->
        <!-- Desktop Price table Geomap starts -->
        <!-- -------------------------------------------------------------------------------------------- -->
        <div class="block-wrapper grid12">
            <div class="block block--label grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="feature-label">Features</div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>Anzahl Lizenzen
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Bitte beachten Sie, dass pro Paket nur ein Nutzer mit einer E-Mail-Adresse
                                    zugelassen ist. Jeder Lizenzinhaber erhält individuellen Zugang zu unserem Service
                                    und seinen Funktionen.
                                </div>
                            </li>
                            <li>PLZ Gebiete inkl.
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Erkunden Sie unterschiedliche Funktionsumfänge, je nach Lizenzart und individuellen
                                    Anforderungen. Wählen Sie zwischen Bundesländer-Ebene, deutschlandweitem oder
                                    gesamtem DACH-Raum.
                                </div>
                            </li>
                            <li>Marktdaten
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Greifen Sie auf zahlreiche duplikatsbereinigte, täglich aktualisierte und
                                    historische Angebotsdaten zu.
                                </div>
                            </li>
                            <li>Suchprofile
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Speichern Sie Ihre Suchkriterien ganz einfach in eigenen Suchprofilen ab und sparen
                                    Sie sich somit bei der nächsten Recherche ganz viel Zeit.
                                </div>
                            </li>
                            <li>Suchprofile teilen
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Richten Sie Ihre gespeicherten Suchprofile für Dritte ein und informieren Sie auf
                                    diese Weise automatisch per E-Mail Ihre Kunden über interessante Angebote.
                                </div>
                            </li>
                            <li>Suchfilter
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Kommen Sie um ein Vielfaches schneller zum Ergebnis mithilfe von verschiedenen
                                    Filterkriterien wie Ortsnavigation, Angebots- und Objektart, Baujahr,
                                    Energiestandards und mehr.
                                </div>
                            </li>
                            <li>Standortanalyse
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Erstellen Sie mit wenigen Klicks tagesaktuelle Standortanalysen, basierend auf
                                    amtlichen Statistiken und Vergleichsobjekten, und laden Sie individuelle PDF-Exposés
                                    herunter.
                                </div>
                            </li>
                            <li>Angebotsverlauf
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Verfolgen Sie den Angebotsverlauf und informieren Sie sich über die Entwicklung
                                    einzelner Angebote, einschließlich Preisänderungen und mehr.
                                </div>
                            </li>
                            <li>Historische Daten
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Erhalten Sie Zugang zu umfassenden historischen Angebotsdaten und
                                    Verlaufsentwicklungen für den gesamten DACH-Raum seit dem Jahr 2015.
                                </div>
                            </li>
                            <li>Zwangsversteigerungen
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Bleiben Sie auf dem Laufenden über die neuesten Zwangsversteigerungen von Immobilien
                                    und Grundstücken.
                                </div>
                            </li>
                            <li>Bauprojekte
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Entdecken Sie Neubau- und Sanierungsprojekte aller Angebotsarten mit detaillierten
                                    Informationen zu den Projekten und beteiligten Unternehmen.
                                </div>
                            </li>
                            <li>Sonderkarten & POI
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Greifen Sie auf umfangreiches Kartenmaterial, wie zum Beispiel Bebauungspläne,
                                    zurück, um die Bedingungen an Ihrem Standort auf einen Blick zu sehen.
                                </div>
                            </li>
                            <li>Portfolio Analyse
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Bewerten Sie Ihr eigenes Immobilienportfolio, um fundierte und datenbasierte
                                    Entscheidungen über Ihre Investitionen zu treffen.
                                </div>
                            </li>
                            <li>Vorkenntnisprüfung
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Erstellen Sie Ihre digitale Vorkenntnisprüfung im Ankaufsprozess mit kartenbasierter
                                    Darstellung und lückenloser Dokumentation.
                                </div>
                            </li>
                            <li>Anbieter Datenbank
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Behalten Sie Ihre Konkurrenz im Auge mit Informationen zu aktuellen Anbietern,
                                    Bauvorhaben und Marktbewegungen.
                                </div>
                            </li>
                            <li>Support
                                <i class="fa-regular fa-circle-info"></i>
                                <div class="info">
                                    Erleben Sie erstklassigen Support! Unser Team steht Ihnen jederzeit per E-Mail
                                    und/oder per Telefon zur Seite, um Ihre Fragen zu beantworten und Probleme zu lösen.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <span class="btn placeholder"></span>
                </div>
            </div>
            <div class="block block--item grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="category">Economy Class</div>
                        <div class="price price-monthly">19 €</div>
                        <div class="price price-yearly">190 €</div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>pro Nutzer</li>
                            <li>1x Bundesland</li>
                            <li>tagesaktuell</li>
                            <li>2</li>
                            <li>&nbsp;</li>
                            <li>einfach</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>Email</li>
                        </ul>
                    </div>
                    <a href="https://app.geomap.immo/dashboard?upgrade=true" class="btn btn--empty"
                        target="_blank">Economy Class buchen</a>
                </div>
            </div>
            <div class="block block--item highlight grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="category">Business Class</div>
                        <div class="price price-monthly">99 €</div>
                        <div class="price price-yearly">990 €</div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>pro Nutzer</li>
                            <li>Deutschland</li>
                            <li>tagesaktuell</li>
                            <li>10</li>
                            <li>&nbsp;</li>
                            <li>erweitert</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>6 Monate</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>Email & Telefon</li>
                        </ul>
                    </div>
                    <a href="https://app.geomap.immo/dashboard?upgrade=true" class="btn btn--fill"
                        target="_blank">Business Class buchen</a>
                </div>
            </div>
            <div class="block block--item  grid12-3 flex">
                <div class="table flexible flex flex-col">
                    <div class="head flexible">
                        <div class="category">First Class</div>
                        <div class="price price-monthly">299 €</div>
                        <div class="price price-yearly">2.990 €</div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>pro Nutzer</li>
                            <li>D-A-CH</li>
                            <li>tagesaktuell</li>
                            <li>unbegrenzt</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>erweitert</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>unbegrenzt</li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li><i class="fa-solid fa-circle-check"></i></li>
                            <li>Email & Telefon</li>
                        </ul>
                    </div>
                    <a href="https://app.geomap.immo/dashboard?upgrade=true" class="btn btn--empty"
                        target="_blank">First Class buchen</a>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------- -->
        <!-- Mobile Price table Geomap starts -->
        <!-- --------------------------------------------------------------------------------------------- -->
        <div class="block-wrapper block-wrapper-mobile">
            <div class="block block--item">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Economy Class</div>
                        <div class="price price-monthly">19 €</div>
                        <div class="price price-yearly">190 €</div>
                    </div>
                    <div class="feature">
                        <div class="feature-content">
                            <div>
                                <span class="text-bold">PLZ Gebiete inkl.:</span><br>1x Bundesland
                            </div>
                            <div>
                                <span class="text-bold">Marktdaten:</span><br>tagesaktuell
                            </div>
                            <div>
                                <span class="text-bold">Suchprofile:</span><br>2
                            </div>
                            <div>
                                <span class="text-bold">Suchfilter:</span><br>einfach
                            </div>
                            <div>
                                <span class="text-bold">Support:</span><br>E-Mail
                            </div>
                        </div>
                        <div class="feature-toggle">
                            <span class="feature-toggle--open">
                                alle Features anzeigen <i class="fa-regular fa-chevron-down"></i>
                            </span>
                            <span class="feature-toggle--close">
                                alle Features verbergen <i class="fa-regular fa-chevron-up"></i>
                            </span>
                        </div>
                    </div>
                    <a href="https://app.geomap.immo/dashboard?upgrade=true">
                        <div class="btn btn--empty" target="_blank">Economy Class buchen</div>
                    </a>
                </div>
            </div>
            <div class="block block--item highlight">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Business Class</div>
                        <div class="price price-monthly"> 99€</div>
                        <div class="price price-yearly"> 990€</div>
                    </div>
                    <div class="feature">
                        <div class="feature-content">
                            <div>
                                <span class="text-bold">PLZ Gebiete inkl.:</span><br>Deutschland
                            </div>
                            <div>
                                <span class="text-bold">Marktdaten:</span><br>tagesaktuell
                            </div>
                            <div>
                                <span class="text-bold">Suchprofile:</span><br>10
                            </div>
                            <div>
                                <span class="text-bold">Suchfilter:</span><br>erweitert
                            </div>
                            <div>
                                <span class="text-bold">Standortanalyse</span>
                            </div>
                            <div>
                                <span class="text-bold">Angebotsverlauf</span>
                            </div>
                            <div>
                                <span class="text-bold">Historische Daten:</span><br>6 Monate
                            </div>
                            <div>
                                <span class="text-bold">Zwangsversteigerungen</span>
                            </div>
                            <div>
                                <span class="text-bold">Bauprojekte</span>
                            </div>
                            <div>
                                <span class="text-bold">Sonderkarten & POI</span>
                            </div>
                            <div>
                                <span class="text-bold">Support:</span><br>Email & Telefon
                            </div>
                        </div>
                        <div class="feature-toggle">
                            <span class="feature-toggle--open">
                                alle Features anzeigen <i class="fa-regular fa-chevron-down"></i>
                            </span>
                            <span class="feature-toggle--close">
                                alle Features verbergen <i class="fa-regular fa-chevron-up"></i>
                            </span>
                        </div>
                    </div>
                    <a href="https://app.geomap.immo/dashboard?upgrade=true">
                        <div class="btn btn--fill" target="_blank">Business Class buchen</div>
                    </a>
                </div>
            </div>
            <div class="block block--item">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">First Class</div>
                        <div class="price price-monthly">299 €</div>
                        <div class="price price-yearly">2.990 €</div>
                    </div>
                    <div class="feature">
                        <div class="feature-content">
                            <div>
                                <span class="text-bold">PLZ Gebiete inkl.:</span><br>D-A-CH
                            </div>
                            <div>
                                <span class="text-bold">Marktdaten:</span><br>tagesaktuell
                            </div>
                            <div>
                                <span class="text-bold">Suchprofile:</span><br>unbegrenzt
                            </div>
                            <div>
                                <span class="text-bold">Suchprofile teilen</span>
                            </div>
                            <div>
                                <span class="text-bold">Suchfilter:</span><br>erweitert
                            </div>
                            <div>
                                <span class="text-bold">Standortanalyse</span>
                            </div>
                            <div>
                                <span class="text-bold">Angebotsverlauf</span>
                            </div>
                            <div>
                                <span class="text-bold">Historische Daten:</span><br>unbegrenzt
                            </div>
                            <div>
                                <span class="text-bold">Zwangsversteigerungen</span>
                            </div>
                            <div>
                                <span class="text-bold">Bauprojekte</span>
                            </div>
                            <div>
                                <span class="text-bold">Sonderkarten & POI</span>
                            </div>
                            <div>
                                <span class="text-bold">Portfolio Analyse</span>
                            </div>
                            <div>
                                <span class="text-bold">Vorkenntnisprüfung</span>
                            </div>
                            <div>
                                <span class="text-bold">Anbieter Datenbank</span>
                            </div>
                            <div>
                                <span class="text-bold">Support:</span><br>Persönlicher Ansprechpartner
                            </div>
                        </div>
                        <div class="feature-toggle">
                            <span class="feature-toggle--open">
                                alle Features anzeigen <i class="fa-regular fa-chevron-down"></i>
                            </span>
                            <span class="feature-toggle--close">
                                alle Features verbergen <i class="fa-regular fa-chevron-up"></i>
                            </span>
                        </div>
                    </div>
                    <a href="https://app.geomap.immo/dashboard?upgrade=true">
                        <div class="btn btn--empty" target="_blank">First Class buchen</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ----------------------------------------------------------------------------------- -->
<!-- Geomap Prcing Ends -->
<!-- ----------------------------------------------------------------------------------- -->
<!-- Villa Pricing starts -->
<!-- ----------------------------------------------------------------------------------- -->
<?php elseif ($option == 'villa'): ?>
<div <?php echo $anchor; ?> class="villa <?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">

        <!-- ------------------------------------------------------------------------------------ -->
        <!-- Mobile & Desktop Price table villa starts -->
        <!-- -------------------------------------------------------------------------------------------- -->
        <h2 class="section-title">Das sind unsere Preise</h2>
        <div class="block-wrapper grid12">
            <div class="block block--label grid12-3 flex">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="feature-label">Eigenes Büro</div>
                        <div class="price price-monthly">ab 447 € <div class="unit">pro Monat</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>Arbeitstisch & Stuhl</li>
                            <li>Druck- und Scannerflatrate (Fair Use)</li>
                            <li>Kaffee-, Tee- und Wasserflatrate</li>
                            <li>24/7 Zugang</li>
                            <li>Eine Stunde Fördermittelberatung kostenlos</li>
                            <li>und vieles mehr...</li>
                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Eigenes Büro anfragen</a> -->

                </div>
            </div>
            <div class="block block--item grid12-3 flex highlight">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Arbeitsplatz</div>
                        <div class="price price-monthly">149 €<div class="unit">pro Monat</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>Arbeitstisch & Stuhl</li>
                            <li>Druck- und Scannerflatrate (Fair Use)</li>
                            <li>Kaffee-, Tee- und Wasserflatrate</li>
                            <li>24/7 Zugang</li>
                            <li>fester Parkplatz (optional)</li>
                            <li>und vieles mehr...</li>
                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Arbeitsplatz anfragen</a> -->
                </div>
            </div>
            <div class="block block--item grid12-3 flex">
                <div class="table  flex flex-col">
                    <div class="head">
                        <div class="category">Meetingraum</div>
                        <div class="price price-monthly">ab 20 €<div class="unit">pro Stunde</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>Bis zu 12 Personen</li>
                            <li>Gute Lage im Norden Leipzigs</li>
                            <li>Parkplätze direkt am Haus</li>
                            <li>Whiteboard / Flipchart und Beamer</li>
                            <li>Catering (optional)</li>
                            <li>und vieles mehr...</li>

                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Meetingraum anfragen</a> -->
                </div>
            </div>
            <div class="block block--item  grid12-3 flex">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Dependance</div>
                        <div class="price price-monthly">ab 50 €<div class="unit">pro Monat</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>zum Beispiel:</br>Dependance Basic</li>
                            <li>reine Postadresse in der Villa Leipzig</li>
                            <li>wöchentlicher Postversand</li>

                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Dependance anfragen</a> -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ---------------------------------------------------------------- -->
<!-- Price Table Villa Ends -->
<!-- --------------------------------------------------------------------- -->
<!-- Dependence (Villa) Pricing starts -->
<!-- ----------------------------------------------------------------------------------- -->
<?php elseif ($option == 'dependence'): ?>
<div <?php echo $anchor; ?> class="villa dependence <?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">

        <!-- ------------------------------------------------------------------------------------ -->
        <!-- Mobile & Desktop Price table villa starts -->
        <!-- -------------------------------------------------------------------------------------------- -->
        <h2 class="section-title">Das sind unsere Preise</h2>
        <div class="block-wrapper">
            <div class="block block--label flex">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="feature-label">Dependance</br>Basic</div>
                        <div class="price price-monthly">49,99 € <div class="unit">pro Monat</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>reine Postadresse in der Villa Leipzig</li>
                            <li>wöchentliche Weiterleitung deiner Post digital oder analog</li>

                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Eigenes Büro anfragen</a> -->

                </div>
            </div>
            <div class="block block--item flex highlight">
                <div class="table flex flex-col">
                    <div class="head">
                        <div class="category">Dependance</br>Premium</div>
                        <div class="price price-monthly">69,99 €<div class="unit">pro Monat</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>Geschäftsadresse zur Gewerbeanmeldung</li>
                            <li>Eigenes Briefkastenschild vor Ort</li>
                            <li>Weiterleitung deiner Post digital oder analog in wählbaren Intervallen</li>
                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Arbeitsplatz anfragen</a> -->
                </div>
            </div>
            <div class="block block--item flex">
                <div class="table  flex flex-col">
                    <div class="head">
                        <div class="category">Dependance</br>Exklusiv</div>
                        <div class="price price-monthly">149,99 €<div class="unit">pro Monat</div>
                        </div>
                    </div>
                    <div class="feature">
                        <ul>
                            <li>wie Dependance Premium</li>
                            <li>zusätzlich 4 Stunden pro Monat Besprechungsraum vor Ort nutzen</li>

                        </ul>
                    </div>
                    <!-- <a href="#" class="btn btn--empty" target="_blank">Meetingraum anfragen</a> -->
                </div>
            </div>


        </div>
    </div>
</div>


<!-- ---------------------------------------------------------------- -->
<!-- Price Table Dependence (Villa) Ends -->
<!-- --------------------------------------------------------------------- -->
<?php else: ?>
<h3>Somthing Wrong</h3>
<?php endif; ?>