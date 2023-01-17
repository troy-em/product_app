<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m230117_193826_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string()->notNull(),
            'code' => $this->string()->notNull()->unique(),
            'category' => $this->string()->notNull(),
            'unit_price' => $this->double()->notNull(),
            'selling_price' => $this->double()->notNull(),
            'reorder_level' => $this->integer()->notNull(),
            'product_images' => $this->text()->null(),
            'is_active' => $this->boolean()->defaultValue(1),
            'user_id' => $this->integer(11)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        // $this->addForeignKey(
        //     'fk-products-user_id',
        //     'products',
        //     'user_id',
        //     'user',
        //     'id',
        //     'CASCADE',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
