# WebRadio-Guy-Chauvet

## **Description du projet**

Ceci est le github du projet WebRadio du lycée Guy Chauvet pour la web radio du lycée<br>

***
## **Environnement technique**
**Serveur utilisé** :
- Apache 2.4

**SGBD** :
- MariaDB 10.5.18
- Adminer 4.8.1

**Langages** :
- HTML 5
- CSS 3
- PHP 7
- JavaScript  

**Accès** :
- FTP 3.0
- Sauvegarde
- Planification a prévoir/recherche 

***

## **Info:** 

branch: <br>
 - login: toutes les versions des login <br>
 - index: toutes les versions des index <br>
 - main: toutes les versions du projet <br>
 - features: toutes les versions des pages. ex: 1T3C, H2P <br>
 - database: toutes les versions backend <br>

---
## **VM**
prendre une vm dynamique <br>
installer git <br>
faire: `git config --global alias.group "!git add -A && git commit -m"` <br>
syntaxe d'utilisation: `git group "modification de la seance"` <br>
creer la bdd avec les structures etc <br>
recup la bdd en .sql et le mettre dans la racine du projet <br>
donner la vm a tt le monde pour pouvoir dev osef  <br>

---
## **SETUP PROJET**
cloner le projet sur la machine: <br>
`cd /var/www/html/` <br>
`git clone https://github.com/Happistarz/WebRadio-Guy-Chauvet.git` <br>
`git config user.name "ton user name github"` <br>
`git config user.mail tonmailgithub@domaine.fr` <br>

---
## **A CHAQUE SEANCE DE DEV**
demarrer l'ide en ssh, donc `ssh chef@ton-ip` et installer l'extension "Remote - SSH" sur VSCode si pas fais <br>
import la bdd en .sql si besoin, sinon refaire <br>
faire `git pull origin main` dans le terminal <br>
dev, <br>
finir par `git group "les modifications de la seance"` et `git push origin [le nom de la branche ou la modification doit etre (ex: index)]` <br>

---

Site main = index.php <br>

Dossier image <br>

<!--Css global qui s’appelle style.css et un css reset qui s’appelle reset.css <br>

Dossier html (toutes les pages) [NomDePage].html<br>

Dossier data (bdd) BDD-[NomDePage].php<br>

Dossier php [NomDePage].php<br>

Dossier JS [NomDePage].js<br>

etc..-->

***

## **Important:**

Pour les title: WebRadio - {NOM DE LA PAGE} <br>

Nommage fichier: <br>

  module: {SA FONCTION}: ex:header. <br>

  page fini: index-{PAGE}: ex.index-emission. <br>
***
## **Contact :**
Adresse mail : gr-sts1-slam@lycee-guychauvet.fr



Group 1
Hugo,  
Index

Group 2
Yoan , Kassim
Les emissions


Group 3
Mathieu , Flo
Page emission (...)

