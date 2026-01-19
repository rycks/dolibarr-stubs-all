<?php

/**
 * Class to manage invoices for pos module (cashdesk)
 */
class Facturation
{
    /**
     * Attributs "volatiles" : reinitialises apres chaque traitement d'un article
     * <p>Attributs "volatiles" : reinitialises apres chaque traitement d'un article</p>
     * int $id			=> 'rowid' du produit dans llx_product
     * string $ref		=> 'ref' du produit dans llx_product
     * int $qte			=> Quantite pour le produit en cours de traitement
     * int $stock		=> Stock theorique pour le produit en cours de traitement
     * int $remise_percent	=> Remise en pourcent sur le produit en cours
     * int $montant_remise	=> Remise en pourcent sur le produit en cours
     * int $prix		=> Prix HT du produit en cours
     * int $tva			=> 'rowid' du taux de tva dans llx_c_tva
     */
    /**
     * @var int ID
     */
    public $id;
    protected $ref;
    protected $qte;
    protected $stock;
    protected $remise_percent;
    protected $montant_remise;
    protected $prix;
    protected $tva;
    /**
     * Attributs persistants : utilises pour toute la duree de la vente (jusqu'a validation ou annulation)
     * string $num_facture	=> Numero de la facture (de la forme FAYYMM-XXXX)
     * string $mode_reglement	=> Mode de reglement (ESP, CB ou CHQ)
     * int $montant_encaisse	=> Montant encaisse en cas de reglement en especes
     * int $montant_rendu	=> Monnaie rendue en cas de reglement en especes
     * int $paiement_le		=> Date de paiement en cas de paiement differe
     *
     * int $prix_total_ht	=> Prix total hors taxes
     * int $montant_tva		=> Montant total de la TVA, tous taux confondus
     * int $prix_total_ttc	=> Prix total TTC
     */
    protected $num_facture;
    protected $mode_reglement;
    protected $montant_encaisse;
    protected $montant_rendu;
    protected $paiement_le;
    protected $prix_total_ht;
    protected $montant_tva;
    protected $prix_total_ttc;
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    // Data processing methods
    /**
     *  Add a product into cart
     *
     *  @return	void
     */
    public function ajoutArticle()
    {
    }
    /**
     *  Remove a product from panel
     *
     *  @param  int		$aArticle	Id of line into cart to remove
     *  @return	void
     */
    public function supprArticle($aArticle)
    {
    }
    /**
     * Calculation of total HT, total TTC and VAT amounts
     *
     * @return	int		Total
     */
    public function calculTotaux()
    {
    }
    /**
     * Reset attributes
     *
     * @return	void
     */
    public function raz()
    {
    }
    /**
     * Resetting persistent attributes
     *
     *  @return	void
     */
    private function razPers()
    {
    }
    // Methods for modifying protected attributes
    /**
     * Getter for id
     *
     * @param	int		$aId	Id
     * @return  int             Id
     */
    public function id($aId = \null)
    {
    }
    /**
     * Getter for ref
     *
     * @param	string	$aRef	Ref
     * @return	string			Ref
     */
    public function ref($aRef = \null)
    {
    }
    /**
     * Getter for qte
     *
     * @param	int		$aQte		Qty
     * @return	int					Qty
     */
    public function qte($aQte = \null)
    {
    }
    /**
     * Getter for stock
     *
     * @param   string	$aStock		Stock
     * @return	string				Stock
     */
    public function stock($aStock = \null)
    {
    }
    /**
     * Getter for remise_percent
     *
     * @param	string	$aRemisePercent		Discount
     * @return	string						Discount
     */
    public function remisePercent($aRemisePercent = \null)
    {
    }
    /**
     * Getter for montant_remise
     *
     * @param	int		$aMontantRemise		Amount
     * @return	string						Amount
     */
    public function montantRemise($aMontantRemise = \null)
    {
    }
    /**
     * Getter for prix
     *
     * @param	int		$aPrix		Price
     * @return	string				Stock
     */
    public function prix($aPrix = \null)
    {
    }
    /**
     * Getter for tva
     *
     * @param	int		$aTva		Vat
     * @return	int					Vat
     */
    public function tva($aTva = \null)
    {
    }
    /**
     * Get num invoice
     *
     * @param string	$aNumFacture		Invoice ref
     * @return	string						Invoice ref
     */
    public function numInvoice($aNumFacture = \null)
    {
    }
    /**
     * Get payment mode
     *
     * @param	int		$aModeReglement		Payment mode
     * @return	int							Payment mode
     */
    public function getSetPaymentMode($aModeReglement = \null)
    {
    }
    /**
     * Get amount
     *
     * @param	int		$aMontantEncaisse		Amount
     * @return	int								Amount
     */
    public function montantEncaisse($aMontantEncaisse = \null)
    {
    }
    /**
     * Get amount
     *
     * @param	int			$aMontantRendu		Amount
     * @return	int								Amount
     */
    public function montantRendu($aMontantRendu = \null)
    {
    }
    /**
     * Get payment date
     *
     * @param	integer		$aPaiementLe		Date
     * @return	integer							Date
     */
    public function paiementLe($aPaiementLe = \null)
    {
    }
    /**
     * Get total HT
     *
     * @param	int		$aTotalHt		Total amount
     * @return	int						Total amount
     */
    public function prixTotalHt($aTotalHt = \null)
    {
    }
    /**
     * Get amount vat
     *
     * @param	int		$aMontantTva	Amount vat
     * @return	int						Amount vat
     */
    public function montantTva($aMontantTva = \null)
    {
    }
    /**
     * Get total TTC
     *
     * @param	int		$aTotalTtc		Amount ttc
     * @return	int						Amount ttc
     */
    public function prixTotalTtc($aTotalTtc = \null)
    {
    }
}