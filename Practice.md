<file path="admin/controller/common/column_left.php">
        <operation>
            <search><![CDATA[ if ($this->user->hasPermission('access', 'marketplace/extension')) { ]]></search>
            <add position="after"><![CDATA[
                $marketplace[] = array(
                    'name'	   => "Modules",
                    'href'     => $this->url->link('marketplace/extension&type=module', 'user_token=' . $this->session->data['user_token'], true),
                    'children' => array()
                );
            ]]></add>
        </operation>
    </file>
