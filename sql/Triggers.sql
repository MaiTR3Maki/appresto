DELIMITER |
CREATE or REPLACE TRIGGER before_ligne_insert
BEFORE INSERT ON ligne_commande
FOR EACH ROW
BEGIN
    DECLARE v_prix_ht DECIMAL(15, 2);

    SELECT prix_ht INTO v_prix_ht FROM produit WHERE id_produit = NEW.id_produit;
    SET NEW.total_ligne_ht = NEW.quantite * v_prix_ht;
END|
DELIMITER ;

/*-------------------------------------------------------*/
DELIMITER |
CREATE or REPLACE TRIGGER before_ligne_update
BEFORE UPDATE ON ligne_commande
FOR EACH ROW
BEGIN
    DECLARE v_prix_ht DECIMAL(15, 2);
    
    SELECT prix_ht INTO v_prix_ht FROM produit WHERE id_produit = NEW.id_produit;
    SET NEW.total_ligne_ht = NEW.quantite * v_prix_ht;
END|
DELIMITER ;

/*-------------------------------------------------------*/
DELIMITER |
CREATE or REPLACE TRIGGER after_ligne_insert
AFTER INSERT ON ligne_commande
FOR EACH ROW
BEGIN
    DECLARE v_total_conso DECIMAL(15, 2);
    DECLARE v_type_conso TINYINT;
    DECLARE v_tva DECIMAL(4, 2);

    /*Récupérer la somme des totaux ligne HT*/
    SELECT SUM(total_ligne_ht) INTO v_total_conso FROM ligne_commande WHERE id_commande = NEW.id_commande;

    /*Récupérer le type de consommation (1 = sur place, 0 = à emporter)*/
    SELECT type_conso INTO v_type_conso FROM commande WHERE id_commande = NEW.id_commande;
   
    /*Déterminer le taux de TVA en fonction du type de consommation*/
    IF v_type_conso = 1 THEN
        SET v_tva = 1.055; -- TVA de 5.5% sur place
    ELSE
        SET v_tva = 1.10;  -- TVA de 10% à emporter
    END IF;

    -- Appliquer la TVA au total
    SET v_total_conso = v_total_conso * v_tva;

    -- Mettre à jour le total consommation dans la commande
    UPDATE commande SET total_conso = v_total_conso WHERE id_commande = NEW.id_commande;
END|
DELIMITER ;

/*-------------------------------------------------------*/
DELIMITER |
CREATE or REPLACE TRIGGER after_ligne_update
AFTER UPDATE ON ligne_commande
FOR EACH ROW
BEGIN
    DECLARE v_total_conso DECIMAL(15, 2);
    DECLARE v_tva DECIMAL(4, 2);
    DECLARE v_type_conso TINYINT;

    /*Récupérer la somme des totaux ligne HT*/
    SELECT SUM(total_ligne_ht) INTO v_total_conso FROM ligne_commande WHERE id_commande = NEW.id_commande;

    /*Récupérer le type de consommation (1 = sur place, 0 = à emporter)*/
    SELECT type_conso INTO v_type_conso FROM commande WHERE id_commande = NEW.id_commande;

    /*Déterminer le taux de TVA en fonction du type de consommation*/
    IF v_type_conso = 1 THEN
        SET v_tva = 1.055; -- TVA de 5.5% sur place
    ELSE
        SET v_tva = 1.10;  -- TVA de 10% à emporter
    END IF;

    -- Appliquer la TVA au total
    SET v_total_conso = v_total_conso * v_tva;

    -- Mettre à jour le total consommation dans la commande
    UPDATE commande SET total_conso = v_total_conso WHERE id_commande = NEW.id_commande;
END|
DELIMITER ;

/*-------------------------------------------------------*/