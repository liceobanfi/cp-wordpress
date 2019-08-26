
**installazione**

questi sono i passaggi per installare la versione di sviluppo del tema, insieme al database gia
configurato e riempito con pagine, menu e post di esempio.

Se non si desidera il database di esempio, fermarsi al passagio 3.

Il tema finale avrà passaggi di installazione molto piu semplici.

**1**

installare wordpress. si puo fare 
- in locale: scaricando lo zip di installazione dal sito `https://it.wordpress.org/download/` e estraendolo dentro alla cartella htdocs
dopodiche seguendo i passaggi indicati
- su shared hosting: scaricando lo zip di installazione su locale, trasferendolo poi via ftp sul server e estraendo successivamente il suo contenuto
una volta terminato il trasferimento. dopodichè segeundo i passaggi indicati
- se si usa shared hosting con wordpress preinstallato, questo passaggio non serve

**2**

installare il tema personalizzato.
per farlo, aprire la cartella dove è installato wordpress, e in `/wp-content/themes/`
creare una nuova cartella  `v05-tema2011-child` e incollarci tutto il contenuto di questa repository
(tranne la cartella `.git` se è presente)

**3**

attivare il tema personalizzato.
per farlo:
- andare nel pannello di controllo di wordpress
- nella sezione temi, cercare e installare dallo store il tema twentieleven
- nella sezione temi scaricati, cercare il tema che ha come nome `v05-tema2011-child` e installarlo

**4**

importare il database con i post e le configurazioni di demo.
per farlo:
- aprire tramite il proprio client sql preferito il database di wordpress, e cancellare il contenuto di tutte le tabelle a eccezione di:
`wp-users`, `wp-usermeta`, `wp-options` (nota: il prefisso `wp-` potrebbe non esserci o essere diverso)
- svuotare il contenuto della tabella `wp-options` lasciando le prime due righe. si può fare utilizzando questo script:
  DELETE FROM `wp_options` WHERE `wp_options`.`option_id` != 1 AND `wp_options`.`option_id` != 2
- importare il database di demo contenuto nel file sql `demo-wp-db.php` (questo file non si trova nella repository online)

**5**

importare la immagini di demo
per farlo, aprire la cartella dove è installato wordpress, e in `\wp-content\uploads\2019\08\`
estrarre tutte le immagini contenute nel file `demo-wp-images.zip` (questo file non si trova nella repository online)





**documentazione utile*
https://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
