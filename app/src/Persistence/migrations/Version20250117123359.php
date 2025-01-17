<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117123359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auction (auction_id UUID NOT NULL, author_id UUID NOT NULL, winner_id UUID DEFAULT NULL, category_id UUID NOT NULL, title VARCHAR(64) NOT NULL, description TEXT DEFAULT NULL, start_price NUMERIC(10, 2) NOT NULL, current_price NUMERIC(10, 2) NOT NULL, buy_now_price NUMERIC(10, 2) DEFAULT NULL, start_date TIMESTAMP(0) WITH TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITH TIME ZONE NOT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(auction_id))');
        $this->addSql('CREATE INDEX IDX_DEE4F593F675F31B ON auction (author_id)');
        $this->addSql('CREATE INDEX IDX_DEE4F5935DFCD4B8 ON auction (winner_id)');
        $this->addSql('CREATE INDEX IDX_DEE4F59312469DE2 ON auction (category_id)');
        $this->addSql('COMMENT ON COLUMN auction.auction_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN auction.author_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN auction.winner_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN auction.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE auction_image (image_id UUID NOT NULL, auction_id UUID NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(image_id))');
        $this->addSql('CREATE INDEX IDX_8A299D5657B8F0DE ON auction_image (auction_id)');
        $this->addSql('COMMENT ON COLUMN auction_image.image_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN auction_image.auction_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE bid (bid_id UUID NOT NULL, auction_id UUID NOT NULL, user_id UUID NOT NULL, amount NUMERIC(10, 2) NOT NULL, time TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(bid_id))');
        $this->addSql('CREATE INDEX IDX_4AF2B3F357B8F0DE ON bid (auction_id)');
        $this->addSql('CREATE INDEX IDX_4AF2B3F3A76ED395 ON bid (user_id)');
        $this->addSql('COMMENT ON COLUMN bid.bid_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN bid.auction_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN bid.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE category (category_id UUID NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(category_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C15E237E06 ON category (name)');
        $this->addSql('COMMENT ON COLUMN category.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE token (token_id UUID NOT NULL, user_id UUID NOT NULL, type VARCHAR(15) NOT NULL, token VARCHAR(255) NOT NULL, creation_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, expiration_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(token_id))');
        $this->addSql('CREATE INDEX IDX_5F37A13BA76ED395 ON token (user_id)');
        $this->addSql('COMMENT ON COLUMN token.token_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN token.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE "user" (user_id UUID NOT NULL, role VARCHAR(5) NOT NULL, oauth_provider VARCHAR(25) DEFAULT NULL, oauth_id VARCHAR(128) DEFAULT NULL, first_name VARCHAR(20) NOT NULL, last_name VARCHAR(20) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(128) DEFAULT NULL, avatar_path VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) NOT NULL, social_media VARCHAR(60) DEFAULT NULL, PRIMARY KEY(user_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64999F0E0D4 ON "user" (avatar_path)');
        $this->addSql('COMMENT ON COLUMN "user".user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE auction ADD CONSTRAINT FK_DEE4F593F675F31B FOREIGN KEY (author_id) REFERENCES "user" (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auction ADD CONSTRAINT FK_DEE4F5935DFCD4B8 FOREIGN KEY (winner_id) REFERENCES "user" (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auction ADD CONSTRAINT FK_DEE4F59312469DE2 FOREIGN KEY (category_id) REFERENCES category (category_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auction_image ADD CONSTRAINT FK_8A299D5657B8F0DE FOREIGN KEY (auction_id) REFERENCES auction (auction_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bid ADD CONSTRAINT FK_4AF2B3F357B8F0DE FOREIGN KEY (auction_id) REFERENCES auction (auction_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bid ADD CONSTRAINT FK_4AF2B3F3A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE token ADD CONSTRAINT FK_5F37A13BA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE auction DROP CONSTRAINT FK_DEE4F593F675F31B');
        $this->addSql('ALTER TABLE auction DROP CONSTRAINT FK_DEE4F5935DFCD4B8');
        $this->addSql('ALTER TABLE auction DROP CONSTRAINT FK_DEE4F59312469DE2');
        $this->addSql('ALTER TABLE auction_image DROP CONSTRAINT FK_8A299D5657B8F0DE');
        $this->addSql('ALTER TABLE bid DROP CONSTRAINT FK_4AF2B3F357B8F0DE');
        $this->addSql('ALTER TABLE bid DROP CONSTRAINT FK_4AF2B3F3A76ED395');
        $this->addSql('ALTER TABLE token DROP CONSTRAINT FK_5F37A13BA76ED395');
        $this->addSql('DROP TABLE auction');
        $this->addSql('DROP TABLE auction_image');
        $this->addSql('DROP TABLE bid');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE "user"');
    }
}
