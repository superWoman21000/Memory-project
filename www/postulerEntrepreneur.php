<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postulerEntrepreneur.css">
    <link rel="stylesheet" href="css/styleAnnonce.css">
    <title>Annonce</title>
</head>
<body>

    <?php include 'navbar.php';?>
    <div class="all-page">
        <div class="formula_steps">
            <ul>
                <p id="personelInformation">Information Personnelles</p>
                <p id="contact">Contact / CV</p>
                <p id="additionalQuation">Question Additionnels</p>
                <p id="revoir">Revoir</p>
            </ul>
        </div>
        <div id="main_first_page">
            <h1>Postuler Pour Le Projet</h1>
            <form id="postulerForm" action="Entrepreneur.php" method="post">
                <div class="formulaire">
                    <label for="">Nom</label>
                    <input type="text" name="nom" id="nom">
                </div>
                <div class="formulaire">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom" id="prenom">
                </div>
                <div class="formulaire">
                    <label for="">Date_de_naissance</label>
                    <input type="date" name="dateDeNaissance" id="dateDeNaissance">
                </div>
                <div class="formulaire">
                    <label for="">Wilaya</label>
                    <select name="wilaya" id="wilaya">
                        <option value="1">1. Adrar</option>
                        <option value="2">2. Chlef</option>
                        <option value="3">3. Laghouat</option>
                        <option value="4">4. Oum El Bouaghi</option>
                        <option value="5">5. Batna</option>
                        <option value="6">6. Béjaïa</option>
                        <option value="7">7. Biskra</option>
                        <option value="8">8. Béchar</option>
                        <option value="9">9. Blida</option>
                        <option value="10">10. Bouira</option>
                        <option value="11">11. Tamanrasset</option>
                        <option value="12">12. Tébessa</option>
                        <option value="13">13. Tlemcen</option>
                        <option value="14">14. Tiaret</option>
                        <option value="15">15. Tizi Ouzou</option>
                        <option value="16">16. Alger (Wilaya d'Alger)</option>
                        <option value="17">17. Djelfa</option>
                        <option value="18">18. Jijel</option>
                        <option value="19">19. Sétif</option>
                        <option value="20">20. Saïda</option>
                        <option value="21">21. Skikda</option>
                        <option value="22">22. Sidi Bel Abbès</option>
                        <option value="23">23. Annaba</option>
                        <option value="24">24. Guelma</option>
                        <option value="25">25. Constantine</option>
                        <option value="26">26. Médéa</option>
                        <option value="27">27. Mostaganem</option>
                        <option value="28">28. M'Sila</option>
                        <option value="29">29. Mascara</option>
                        <option value="30">30. Ouargla</option>
                        <option value="31">31. Oran</option>
                        <option value="32">32. El Bayadh</option>
                        <option value="33">33. Illizi</option>
                        <option value="34">34. Bordj Bou Arreridj</option>
                        <option value="35">35. Boumerdès</option>
                        <option value="36">36. El Tarf</option>
                        <option value="37">37. Tindouf</option>
                        <option value="38">38. Tissemsilt</option>
                        <option value="39">39. El Oued</option>
                        <option value="40">40. Khenchela</option>
                        <option value="41">41. Souk Ahras</option>
                        <option value="42">42. Tipaza</option>
                        <option value="43">43. Mila</option>
                        <option value="44">44. Aïn Defla</option>
                        <option value="45">45. Naâma</option>
                        <option value="46">46. Aïn Témouchent</option>
                        <option value="47">47. Ghardaïa</option>
                        <option value="48">48. Relizane</option>
                        <option value="49">49. El M'Ghair</option>
                        <option value="50">50. El Menia</option>
                        <option value="51">51. Ouargla</option>
                        <option value="52">52. Béchar</option>
                        <option value="53">53. El Bayadh</option>
                        <option value="54">54. Illizi</option>
                        <option value="55">55. Tindouf</option>
                        <option value="56">56. Tamanrasset</option>
                        <option value="57">57. Djanet</option>
                        <option value="58">58. Timimoun</option>
                    </select>

                </div>
                <div class="formulaire">
                    <label for="">Etat civile</label>
                    <select name="etatCivile" id="etatCivile">
                        <option value="1">célibataire</option>
                        <option value="2">marié(e)</option>
                        <option value="">divorcé(e)</option>
                        <option value="4">veuf/veuv</option>
                    </select>
                </div>  

                <div class="formulaire">
                    <label for="">Genre</label>
                    <select name="genre" id="genre">
                        <option value="1">féminin</option>
                        <option value="2">masculin</option>
                    </select>
                </div>
            </form>
            <div class="status">
                <button id="firstNextButton">suivant</button>
            </div>
        </div>
    </div>
    <script src="js/postulerEntrepreneur.js"></script>
</body>
</html>