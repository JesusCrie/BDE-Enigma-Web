@extends('layouts.app')

@section('content')
    <div class="container-large my-20">
        <h1 class="text-4xl">
            Tutoriel - Introduction à l'analyse statique d'un éxecutable
        </h1>

        <p class="separator"></p>

        <div class="alert blue">
            Ce tutoriel a été conçu a partir de <a
                href="https://www.youtube.com/playlist?list=PLhixgUqwRTjxglIswKp9mpkfPNfHkzyeN">cette playlist
                youtube</a> que je vous recommande très fortement.
        </div>

        <h2 id="elf" class="mt-16 text-3xl">
            Le format ELF
        </h2>
        <br>

        <p class="description">
            ELF est un format de fichiers executables utilisé par tous les systèmes Unix (sauf macOS, ça serait trop
            beau).
            C'est dans ce format la que sont tous les programmes sous Linux.
            <br><br>
            Chaque executable est découpé en plusieurs parties (des sections) qui ont chacunes un role particulier comme
            la section <span class="code">.text</span> qui contient le code ou <span class="code">.data</span> qui
            contient
            les variables globales.
            <br><br>
            <a href="https://en.wikipedia.org/wiki/Executable_and_Linkable_Format">Plus d'informations</a>
        </p>

        <h2 id="x86" class="mt-16 text-3xl">
            Assembly x86
        </h2>
        <br>

        <p class="description">
            En assembleur x86 les instructions sont très similaires au 68k excepter peut-être plus simple.
            <br>
            Par exemple <span class="code">MOVE.L #5, %D1</span> deviens <span class="code">mov eax, 5</span>. Ce qui
            est plus logique puisqu'on peut le lire <span class="code">eax = 5</span> qui est le même sens qu'en
            programmation. Ansi <span class="code">eax += 8</span> donne <span class="code">add eax, 8</span>.
            <br><br>

            La taille des opérandes n'a pas à être spécifiée dans l'instruction, elle est déduite à partir des opérandes
            eux-mêmes. Ansi <span class="code">rax, eax, ax, ah, al</span> correspondent en réalité au même registre.
            <br>
            <span class="code">rax</span> correspond aux 64bits du registre AX.
            <br>
            <span class="code">eax</span> correspond aux 32 bits de poids faibles de AX (.L).
            <br>
            <span class="code">ax</span> correspond aux 16 bits de poids faibles de AX (.W).
            <br>
            <span class="code">al</span> correspond aux 8 bits de poids faibles de AX (.B).
            <br>
            <span class="code">ah</span> correspond aux 8 bits de poids forts des 16 premiers bits.
            <br>
            Il est plus simple de les visualiser dans <a href="https://en.wikibooks.org/wiki/X86_Assembly/X86_Architecture">ce tableau</a>.
            <br><br>

            Il y a 8 registres généraux (equivalent des D0..D6), <span class="code">rax, rcx, rdx, rbx, rsp, rbp, rsi, rdi</span>
            <br>
            Le registre <span class="code">rsp</span> correspond à <span class="code">%SP</span> (Stack Pointer), il pointe
            vers le sommet du stack. De même <span class="code">rbp</span> pointe vers la base du stack. A eux deux, ils
            délimitent la "stack frame". Tout ce qu'il y a avant <span class="code">rbp</span> appartient à la fonction
            précédente ce qui veux dire que si des arguments sont sur le stack, ils seront recuperés avec une instruction
            comme <span class="code">mov rax, qword [rbp + 0x8]</span> (les crochets sont l'equivalent des parenthèse en 68k)
            qui permettent donc de stocker dans <span class="code">rax</span> ce qui est contenu a l'adresse <span class="code">rbp + 0x8</span>
            qui a de forte chance d'être un argument.
            <br>
            <span class="italic">NB: En 64bits, les arguments sont passés dans des registres plutot que sur
            le stack, les arguments sont passer dans ce sens: <span class="code">rax, rdi, rsi, rdx, r10, r8, r9</span></span>.
            <br><br>

            A ne pas confondre avec les variables locales qui elles sont situés dans la stack frame et sont donc
            référencées par ce genre d'instruction <span class="code">mov rax, qword [rbp - 0x8]</span>.
            <br>
            Enfin la stack frame est construite au debut de la fonction et détruite à la fin de la fonction. Au debut on
            push <span class="code">rbp</span> sur le stack pour le sauvgarder, puis on le modifie pour qu'il prenne la
            valeur du précedent sommet du stack (<span class="code">rsp</span>) et enfin on bouge le sommet d'un certain
            nombre de bytes pour faire de la place aux variables locales. Quand la fonction ce termine, le processus inverse
            est executé mais il existe deux instructions qui font ceci à notre place.
            <br>
            Dans la réalité, ca ressemble à ca:
        </p>

        <p class="code-block">
            push rbp<br>
            mov rbp, rsp<br>
            add rsp, 0x10<br>
            ...<br>
            leave<br>
            ret
        </p>
        <br>

        <p class="description">
            <a href="https://en.wikibooks.org/wiki/X86_Assembly">Pour plus d'informations</a>
        </p>

        <h2 id="radare" class="mt-16 text-3xl">
            Radare2
        </h2>
        <br>

        <p class="description">
            <a href="https://github.com/radare/radare2">Radare2</a> est un outil de reverse engineering en ligne de
            commande.
            <br><br>

            Il permet de lire et dessassembler un executable, il supporte enormement d'architectures dont le x86-64 et
            le m68k.
            <br>
            Il est disponible sur transit et dans les dépots officiels de plus ou moins toutes les distributions linux.
            <br>
            Il existe egalement d'autres outils equivalent comme BinaryNinja, IDA, Hopper, ...
            <br><br>

            Pour étudier un executable dans radare2 il suffit de l'ouvrir avec <span
                class="code">r2 un_executable</span>.
            <br>
            Maintenant le fichier est ouvert dans radare et il est possible d'entrer des commandes comme <span
                class="code">aaa</span>
            qui va permettre de demander à radare d'analyser le fichier.
            <br><br>

            Maintenant que radare a etudier tous les symboles présents dans le fichier, il est possible de bouger le
            curseur
            pour aller à un de ces symboles. Les symboles sont des restes laissés par le compilateur et contiennent
            entre autre
            le nom des fonctions et strings, c'est un concept proche des labels.
            <br>
            Pour se deplacer à une certaine adresse on utilise <span class="code">s &lt;address&gt;</span>, par exemple
            la fonction principale peut être atteinte avec <span class="code">s sym.main</span> dans la plupart des cas.
            <br>
            Ensuite on peut demander à radare de desassembler un certains nombre d'instructions à partir de l'endroit où
            l'on est. Par exemple <span class="code">pd 20</span> (Print Dissassembly) permet de desassembler les 20
            instructions suivantes.
            <br>
            Mais puisque nous sommes sur une fonction il est possible de desassembler toute la fonction avec <span
                class="code">pdf</span>.
            <br><br>

            Pour connaitres d'autres commandes utilisez <span class="code">?</span> et pour avoir de l'aide sur une
            sous-catégorie de commande, par exemple les commandes qui affiche des choses, <span class="code">p?</span>
            ou même sur les commandes qui affiche du code désassemblé, <span class="code">pd?</span>.
            <br><br>

            Vous pouvez changer le nom des variables locales d'une fonction avec <span class="code">afvn new old</span>
            (ex: <span class="code">afvn i var_4h</span>).
            <br><br>

            Il existe egalement un front-end graphique à radare appelé <a href="https://github.com/radareorg/cutter">Cutter</a>.
            <br>
            Radare est infiniment plus complet et complexe que présenter ici, si vous êtes interressez, vous avez de
            quoi vous occuper à essayer de le maitriser.
        </p>

        <h2 id="analyse" class="mt-16 text-3xl">
            Analyse
        </h2>
        <br>

        <p class="description">
            Après avoir ouvert le fichier dans radare2 et desassembler la fonction principale, il est temps d'analyser
            le code.
            <br>
            Première étape: ne pas s'affoler, il y a une grande partie des instructions qu'il n'est pas utile de comprendre.
            Une première approche est de regarder uniquement les appels de fonction (<span class="code">call sym.fonction</span>)
            et si est une fonction de linux, de chercher son usage dans le manuel, <span class="code">man 3 printf</span> par exemple.
            <br><br>

            Passer en mode visuel peut egalement grandement aider a visualier la tête du programme. Entrez en mode visuel avec
            <span class="code">VV</span> et sortez en en appuyant deux fois sur <span class="code">q</span>.
            <br>
            Utilisez les commentaires que met automatiquement radare, ils sont utiles.
            <br>
            Si vous voyez une variable nommée <span class="code">canary</span>, ignorez-la, c'est une protection contre un
            type de buffer overflow ajoutée par le compilateur.
            <br><br>

            Pour ce qui est du reste, notez tout ce que vous trouver, il y a beaucoup de choses, essayer de reconnaitre
            des structures familières.
            <br>
            Par exemple un <span class="code">for (int i = 0; i <= 4; i++)</span> ressemblera plus ou moins à ceci:
        </p>

        <p class="code-block">
            0x00001141 mov dword [i], 0<br>
            0x00001148 jmp <span class="text-green-dark">0x115a</span><br>
            <span class="text-red">0x0000114a</span> ...<br>
            0x00001156 add dword [i], 1<br>
            <span class="text-green-dark">0x0000115a</span> cmp dword [i], 4<br>
            0x0000115e jle <span class="text-red">0x114a</span>
        </p>

        <p class="description">
            Acceder au deuxième element d'un tableau de byte ressemblerai à:
        </p>

        <p class="code-block">
            mov rax, qword [array]<br>
            add rax, 1<br>
            ... utilise rax
        </p>
        <br>

        <p class="description">
            Si vous n'arrivez vraiment pas à vous representer ce que fait un morceau de code, essayez de debugger le programme,
            je vous renvoie à la playlist mentionnée tout en haut de cette page.
        </p>
    </div>
@endsection
