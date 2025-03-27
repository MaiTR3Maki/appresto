/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package testapi;

/**
 *
 * @author FM504305
 */
public class commande {
    private Integer id_commande;
    private String date;
    private String Heure;
    private String lib_etat;
    private Integer nb_plat;
    private double montant;

    public commande(Integer id_commande, String date, /*String Heure,*/ String lib_etat, Integer nb_plat, double montant) {
        this.id_commande = id_commande;
        this.date = date;
        /*this.Heure = Heure;*/
        this.lib_etat = lib_etat;
        this.nb_plat = nb_plat;
        this.montant = montant;
    }

    public Integer getId_commande() {
        return id_commande;
    }

    public String getDate() {
        return date;
    }

    public String getHeure() {
        return Heure;
    }

    public String getLib_etat() {
        return lib_etat;
    }

    public Integer getNb_plat() {
        return nb_plat;
    }

    public double getMontant() {
        return montant;
    }

    public void setId_commande(Integer id_commande) {
        this.id_commande = id_commande;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public void setHeure(String Heure) {
        this.Heure = Heure;
    }

    public void setLib_etat(String lib_etat) {
        this.lib_etat = lib_etat;
    }

    public void setNb_plat(Integer nb_plat) {
        this.nb_plat = nb_plat;
    }

    public void setMontant(double montant) {
        this.montant = montant;
    }
    
    
    
    
    
}
