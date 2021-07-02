<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Repositories;

use App\Models\Company;

/**
 * CompanyRepository.
 */
class CompanyRepository extends BaseRepository
{
    public function __construct()
    {
    }

    /**
     * Saves the client and its contacts.
     *
     * @param array $data The data
     * @param Company $company
     * @return Company|null  Company Object
     */
    public function save(array $data, Company $company) : ?Company
    {
        if (isset($data['custom_fields']) && is_array($data['custom_fields'])) {
            $data['custom_fields'] = $this->parseCustomFields($data['custom_fields']);
        }

        $company->fill($data);

        if (array_key_exists('settings', $data)) {
            $company->saveSettings($data['settings'], $company);
        }

        $company->save();

        return $company;
    }

    private function parseCustomFields($fields) :array
    {
        
        if(array_key_exists('account1', $fields))
            $fields['company1'] = $fields['account1'];

        if(array_key_exists('company2', $fields))
            $fields['company2'] = $fields['account2'];

        if(array_key_exists('invoice1', $fields))
            $fields['surcharge1'] = $fields['invoice1'];

        if(array_key_exists('invoice2', $fields))
            $fields['surcharge2'] = $fields['invoice2'];

        if(array_key_exists('invoice_text1', $fields))
            $fields['invoice1'] = $fields['invoice_text1'];

        if(array_key_exists('invoice_text2', $fields))
            $fields['invoice2'] = $fields['invoice_text2'];

        foreach ($fields as &$value) {
            $value = (string) $value;
        }

        return $fields;
    }
}
