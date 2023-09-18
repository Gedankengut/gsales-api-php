<?php

declare(strict_types=1);

namespace Gsales;

use Gsales\Endpoint\Article;
use Gsales\Endpoint\Attachement;
use Gsales\Endpoint\Comment;
use Gsales\Endpoint\ConfigurationGroup;
use Gsales\Endpoint\Configuration;
use Gsales\Endpoint\ContractPos;
use Gsales\Endpoint\Contract;
use Gsales\Endpoint\Currency;
use Gsales\Endpoint\Customer;
use Gsales\Endpoint\Delivery;
use Gsales\Endpoint\DeliveryPos;
use Gsales\Endpoint\Document;
use Gsales\Endpoint\History;
use Gsales\Endpoint\InvoicePos;
use Gsales\Endpoint\Invoice;
use Gsales\Endpoint\LetterTemplate;
use Gsales\Endpoint\Letter;
use Gsales\Endpoint\Note;
use Gsales\Endpoint\OfferPos;
use Gsales\Endpoint\Offer;
use Gsales\Endpoint\Queue;
use Gsales\Endpoint\RefundPos;
use Gsales\Endpoint\Refund;
use Gsales\Endpoint\SalePos;
use Gsales\Endpoint\Sale;
use Gsales\Endpoint\Tax;
use Gsales\Endpoint\Unit;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;

final class Client
{
    private ClientBuilder $clientBuilder;

    public function __construct(Options $options = null)
    {
        $options = $options ?? new Options();

        $this->clientBuilder = $options->getClientBuilder();
        $this->clientBuilder->addPlugin(new BaseUriPlugin($options->getUri()));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'User-Agent' => 'gsales-php',
                    'Content-Type' => 'application/ld+json',
                    'Accept' => 'application/ld+json',
                ]
            )
        );
    }

	public function articles(): Article
	{
		return new Article($this);
	}

	public function attachements(): Attachement
	{
		return new Attachement($this);
	}

	public function comments(): Comment
	{
		return new Comment($this);
	}

	public function configurationGroups(): ConfigurationGroup
	{
		return new ConfigurationGroup($this);
	}

	public function configuration(): Configuration
	{
		return new Configuration($this);
	}

	public function contractPos(): ContractPos
	{
		return new ContractPos($this);
	}

	public function contract(): Contract
	{
		return new Contract($this);
	}

	public function currency(): Currency
	{
		return new Currency($this);
	}

	public function customer(): Customer
	{
		return new Customer($this);
	}

	public function delivery(): Delivery
	{
		return new Delivery($this);
	}

	public function deliveryPos(): DeliveryPos
	{
		return new DeliveryPos($this);
	}

	public function document(): Document
	{
		return new Document($this);
	}

	public function history(): History
	{
		return new History($this);
	}

	public function invoicePos(): InvoicePos
	{
		return new InvoicePos($this);
	}

	public function invoice(): Invoice
	{
		return new Invoice($this);
	}

	public function letterTemplate(): LetterTemplate
	{
		return new LetterTemplate($this);
	}

	public function letter(): Letter
	{
		return new Letter($this);
	}

	public function note(): Note
	{
		return new Note($this);
	}

	public function offerPos(): OfferPos
	{
		return new OfferPos($this);
	}

	public function offer(): Offer
	{
		return new Offer($this);
	}

	public function queue(): Queue
	{
		return new Queue($this);
	}

	public function refundPos(): RefundPos
	{
		return new RefundPos($this);
	}

	public function refund(): Refund
	{
		return new Refund($this);
	}

	public function salePos(): SalePos
	{
		return new SalePos($this);
	}

	public function sale(): Sale
	{
		return new Sale($this);
	}

	public function tax(): Tax
	{
		return new Tax($this);
	}

	public function unit(): Unit
	{
		return new Unit($this);
	}

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }
}