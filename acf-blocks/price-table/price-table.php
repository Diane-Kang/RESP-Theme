<?php

/**
 * Textbox Block Template.
 *
 */


// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "price-table");
array_unshift($container_classes, "container");


?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <h1 class="heading1">TeamProQ Preisliste</h1>
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
    <!-- Desktop Price table -->
    <div class="block-wrapper grid12">
      <div class="block block--label grid12-3 flex">
        <div class="table flexible flex flex-col">
          <div class="head flexible">
            <h5>Features</h5>
          </div>
          <div class="feature">
            <ul>
              <li>Anzahl Nutzer<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Verkauf<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Kontakte<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Vertrieb: Vertriebsportal<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Vertrieb: Leadgenerierung<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Vertrieb: Vertragsabwicklung<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Dateien<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Speicherplatz<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Immobilienberechnungen<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Provision<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Dashboard<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Vermietung<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Mängelmanagement<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Support<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Einrichtung & Konfiguration<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
              <li>Admin Schulung<i class="fa-regular fa-circle-info"></i>
                <div class="info">Das Modul Dateien ermöglicht das Speichern von Dateien auf der TeamProQ-Arbeitsplattform. Stellen Sie Dateien aller Formate passwortgeschützt online zur Verfügung – weltweit und jederzeit.</div>
              </li>
            </ul>
          </div>
          <a href="#" class="btn btn-info btn-round"></a>
        </div>
      </div>
      <div class="block block--item grid12-3 flex">
        <div class="table flexible flex flex-col">
          <div class="head flexible">
            <h4 class="category">Economy Class</h4>
            <h4 class="price price-monthly">169 €</h4>
            <h4 class="price price-yearly">1.690 €</h4>
          </div>
          <div class="feature">
            <ul>
              <li>unbegrenzt</li>
              <li><i class="fa-solid fa-circle-check"></i></li>
              <li><i class="fa-solid fa-circle-check"></i></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>5 GB</li>
              <li>1 Nutzer</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>E-Mail</li>
              <li>obligatorisch</li>
              <li>empfohlen</li>
            </ul>
          </div>
          <a href="#" class="btn btn--empty">Economy Class buchen</a>
        </div>
      </div>
      <div class="block block--item highlight grid12-3 flex">
        <div class="table flexible flex flex-col">
          <div class="head flexible">
            <h4 class="category">Business Class</h4>
            <h4 class="price price-monthly">329 €</h4>
            <h4 class="price price-yearly">2.990 €</h4>
          </div>
          <div class="feature">
            <ul>
              <li>unbegrenzt</li>
              <li><i class="fa-solid fa-circle-check"></i></li>
              <li><i class="fa-solid fa-circle-check"></i></li>
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
              <li>obligatorisch</li>
              <li>empfohlen</li>
            </ul>
          </div>
          <a href="#" class="btn btn--empty">Economy Class buchen</a>
        </div>
      </div>
      <div class="block block--item  grid12-3 flex">
        <div class="table flexible flex flex-col">
          <div class="head flexible">
            <h4 class="category">First Clas</h4>
            <h4 class="price price-monthly">100€/mon</h4>
            <h4 class="price price-yearly">1.290€</h4>
          </div>
          <div class="feature">
            <ul>
              <li>unbegrenzt</li>
              <li><i class="fa-solid fa-circle-check"></i></li>
              <li><i class="fa-solid fa-circle-check"></i></li>
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
              <li>Persönlicher Ansprechpartner</li>
              <li>obligatorisch</li>
              <li>empfohlen</li>
            </ul>
          </div>
          <a href="#" class="btn btn--empty">First Class buchen</a>
        </div>
      </div>
    </div>
    <!-- Mobile Price table -->
    <div class="block-wrapper block-wrapper-mobile">
      <div class="block block--item">
        <div class="table flex flex-col">
          <div class="head">
            <h4 class="category">Economy Class</h4>
            <h4 class="price price-monthly">169 €</h4>
            <h4 class="price price-yearly">1.690 €</h4>
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
              <div>
                <span class="text-bold">Einrichtung & Konfiguration:</span><br>obligatorisch
              </div>
              <div>
                <span class="text-bold">Admin-Schulung:</span><br>empfohlen
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
          <a href="#">
            <div class="btn btn--empty">Economy Class buchen</div>
          </a>
        </div>
      </div>
      <div class="block block--item highlight">
        <div class="table flex flex-col">
          <div class="head">
            <h4 class="category">Business Class</h4>
            <h4 class="price price-monthly">329 €</h4>
            <h4 class="price price-yearly">2.990 €</h4>
          </div>
          <div class="feature">
            <div class="feature-content">
              inklusive der Module <br>
              <span class="text-bold">
                Verkauf<br>
                Kontakte<br>
                Vertrieb: Vertriebsportal<br>
                Vertrieb: Leadgenerierung<br>
                Vertrieb: Vertragsabwicklung<br>
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
              <div>
                <span class="text-bold">Einrichtung & Konfiguration:</span><br>obligatorisch
              </div>
              <div>
                <span class="text-bold">Admin-Schulung:</span><br>empfohlen
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
          <a href="#">
            <div class="btn btn--empty">Business Class buchen</div>
          </a>
        </div>
      </div>
      <div class="block block--item">
        <div class="table flex flex-col">
          <div class="head">
            <h4 class="category">First Class</h4>
            <h4 class="price price-monthly">699 €</h4>
            <h4 class="price price-yearly">6.990 €</h4>
          </div>
          <div class="feature">
            <div class="feature-content">
              inklusive der Module <br>
              <span class="text-bold">
                Verkauf<br>
                Kontakte<br>
                Vertrieb: Vertriebsportal<br>
                Vertrieb: Leadgenerierung<br>
                Vertrieb: Vertragsabwicklung<br>
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
                <span class="text-bold">Support:</span><br>Persönlicher Ansprechpartner
              </div>
              <div>
                <span class="text-bold">Einrichtung & Konfiguration:</span><br>obligatorisch
              </div>
              <div>
                <span class="text-bold">Admin-Schulung:</span><br>empfohlen
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
          <a href="#">
            <div class="btn btn--empty">First Class buchen</div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>