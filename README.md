# TailwindCSS en autodidacte

![TailwindCSS](./asset/img/tailwindcss.webp)

*Image illustrant TailwindCSS.*

## Sommaire :

- [**🌟 Introduction**](#introduction)
  - [Qu'est-ce que TailwindCSS ?](#quest-ce-que-tailwindcss)
  - [Points forts de TailwindCSS](#points-forts-de-tailwindcss)
  - [Extension VScode](#extension-vscode)
  
- [**👾 Initialisation d'un projet basique avec TailwindCSS**](/TS_sans_framework/readme.md)
  - [Prérequis](/TS_sans_framework/readme.md#prérequis)
  - [Création du projet](/TS_sans_framework/readme.md#création-du-projet)
  - [Structure du projet](/TS_sans_framework/readme.md#structure-du-projet)
  - [mettre à jour le fichier CSS de TailwindCSS](/TS_sans_framework/readme.md#mettre-à-jour-le-fichier-css-de-tailwindcss)

- [**🚅 Initialisation d'un projet viteJS avec TailwindCSS**](/viteJS/readme.md)
  - [Prérequis](/viteJS/readme.md#prérequis)
  - [Création du projet](/viteJS/readme.md#création-du-projet)
  - [Structure du projet](/viteJS/readme.md#structure-du-projet)
  - [Lancement du serveur de développement](/viteJS/readme.md#lancement-du-serveur-de-développement)

- [**📦 Initialisation d'un projet PHP/nodeJS avec TailwindCSS pour Docker**](/php_nodeJS/readme.md)
  - [Prérequis](/php_nodeJS/readme.md#prérequis)
  - [Création du projet](/php_nodeJS/readme.md#création-du-projet)
  - [Lancement du serveur de développement](/php_nodeJS/readme.md#lancement-du-serveur-de-développement)
  - [mettre à jour le fichier CSS de TailwindCSS](/php_nodeJS/readme.md#mettre-à-jour-le-fichier-css-de-tailwindcss)

- [**🏁 Conclusion**](#conclusion)
- [**🥇 Contribution**](#contribution)
  - [Contribueur](#contribueur)
- [**Licence**](#licence)

## Introduction

### Qu'est-ce que TailwindCSS ?
TailwindCSS est un framework CSS utilitaire qui permet de concevoir des interfaces utilisateurs rapidement et de manière flexible. Contrairement aux autres frameworks comme Bootstrap, Tailwind n'impose pas de styles prédéfinis pour les composants (boutons, cartes, etc.), mais fournit plutôt une série de classes CSS utilitaires que tu peux combiner directement dans ton HTML pour créer tes propres designs. Cela te permet d'avoir un contrôle total sur l'apparence de ton site tout en écrivant moins de CSS personnalisé.

Par exemple, pour créer un bouton avec TailwindCSS, tu utiliserais des classes comme celles-ci dans ton HTML :
```html
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Mon bouton
</button>
```
Chaque classe (`bg-blue-500`, `hover:bg-blue-700`, `py-2`, etc.) correspond à un style spécifique (couleur de fond, effet au survol, marges, etc.), ce qui permet d'éviter d'écrire des règles CSS dans un fichier séparé.

### Points forts de TailwindCSS :
- **Flexibilité** : Tu n'es pas limité par des composants préconstruits, tu crées exactement ce que tu veux.

- **Gain de temps** : Pas besoin de repasser par du CSS personnalisé pour des détails, tout peut être géré avec des classes utilitaires.

- **Personnalisable** : Tu peux configurer Tailwind pour qu'il génère exactement les styles dont tu as besoin, réduisant ainsi la taille des fichiers CSS en production.

C'est particulièrement apprécié pour des projets où tu veux un contrôle précis sur le design, sans avoir à te soucier de la surcharge de styles imposée par des frameworks plus traditionnels.

### Extension VScode

Dans visuel studio code l'extension [`Tailwind CSS IntelliSense`](https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss) améliore l'expérience de développement de Tailwind en offrant aux utilisateurs de Visual Studio Code des fonctionnalités avancées telles que l'autocomplétion, la coloration syntaxique et le linting.

---

## Contribution

Les contributions à ce repository sont les bienvenues ! Si vous souhaitez corriger une erreur ou améliorer le contenu existant, n'hésitez pas à m'en faire part.

### Contribueur

- [**👨‍💻🥇 Alexander worldercraft**](https://github.com/alexanderworldercraft)

## Licence

Ce contenu est sous licence [GNU GPLv3](LICENSE.txt). Vous êtes libre de l'utiliser, le modifier et le distribuer selon les termes de cette licence.

---

Bonne apprentissage et bon développement !