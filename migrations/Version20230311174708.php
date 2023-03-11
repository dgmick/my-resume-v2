<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311174708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE IF NOT EXISTS experiences (id INT AUTO_INCREMENT NOT NULL, job_role VARCHAR(50) NOT NULL, company VARCHAR(50) NOT NULL, start_at VARCHAR(20) NOT NULL, period_end VARCHAR(50) NOT NULL, resume LONGTEXT NOT NULL, is_experience TINYINT(1) NOT NULL, job_status VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS skill_chart (id INT AUTO_INCREMENT NOT NULL, techno VARCHAR(50) NOT NULL, value VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS professional_skill (id INT AUTO_INCREMENT NOT NULL, techno VARCHAR(50) NOT NULL, framework VARCHAR(255) DEFAULT NULL, universe VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(20) NOT NULL, first_name VARCHAR(20) NOT NULL, job VARCHAR(50) NOT NULL, localisation VARCHAR(50) NOT NULL, phone_number VARCHAR(10) NOT NULL, language VARCHAR(50) NOT NULL, about_me LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE experiences ADD localisation VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE user ADD hobies VARCHAR(255) DEFAULT NULL');

        $this->addSql("
        INSERT INTO `experiences` (`id`, `job_role`, `company`, `start_at`, `period_end`, `resume`, `is_experience`, `job_status`, `localisation`) VALUES
(1, 'Web Developer', 'Orchid Création', 'March 2017', 'June 2017', 'Design of a web application created from an Excel file. <br>\r\nThis file consisted of calculating the working time of each Employee and the income of each Project.<br><br>\r\n\r\nTechnologies used : PHP/Symfony 3, MYSQL, HTML, JavaScript.', 1, 'Internship', 'Paris, France'),
(2, 'Web Developer', 'Numerique 1', 'July 2017', 'December 2017', 'My job was to create new features of a web application for companies (Creation of the administration, creation of a poll, Retrieval of Outlook and Gmail emails using APIs, Fixture Creations).\r\n<br><br>\r\nFixed-term contract: Api REST, PHP/Symfony 3, Angular, MYSQL.', 1, 'Temporary position', 'Massy (91), Francce'),
(3, 'Web Developer', 'Expandi Group', 'March 2018', 'April 2019', 'My job consisted of developing and maintaining multiple sites in production for several clients. <br>\r\n\r\n- First major project: Creation and implementation of the \"GDPR.  <br>\r\n- Modification of existing code to make the site \"Multi-Country\", which means displaying:\r\nthe currencies, leads, and sales according to the user\'s country but visible to \"Super Admins\".\r\n\r\n  <br>  <br>\r\nTechnologies used: Linux, PHP/Symfony 2-3-4, MYSQL, GitLab, Redmine.', 1, 'Permanent position', 'Boulogne-Billancourt, France'),
(4, 'Web Developer', 'XXII', 'August 2019', 'January 2020', 'My job consisted of developing \"Web APIs\" by retrieving data from a Python back-end using Json data format.\r\n\r\n<br><br>\r\nTechnologies utilisées : Linux, Symfony 4, ReactJs, API PlatForm, Docker.', 1, 'Permanent position', 'Suresnes, France'),
(5, 'Web Developer', 'Collector Square', 'February 2020', 'Now', '...', 1, 'Permanent position', 'Paris, France'),
(6, 'IT Designer Developer (Bac+3)', 'M2I Formation', 'September 2016', 'Juin 2017', '...', 0, 'Student', 'Paris, France');");

        $this->addSql("
        INSERT INTO `professional_skill` (`id`, `techno`, `framework`, `universe`) VALUES
(1, 'php', 'Symfony', 'BackEnd'),
(2, 'mysql', NULL, 'BackEnd'),
(3, 'elasticsearch', NULL, 'BackEnd'),
(4, 'Html', NULL, 'FrontEnd'),
(5, 'css', 'sass, tailwindcss', 'FrontEnd'),
(6, 'Javascript', 'jquery', 'FrontEnd'),
(7, 'github', NULL, 'OTHER SKILLS'),
(8, 'linux', NULL, 'OTHER SKILLS'),
(9, 'macos', NULL, 'OTHER SKILLS'),
(10, 'python', NULL, 'RECENTLY LEARNING'),
(11, 'swift', 'swiftUi', 'RECENTLY LEARNING');
        ");

        $this->addSql("
        INSERT INTO `skill_chart` (`id`, `techno`, `value`) VALUES
(1, 'Swift(SwiftUi)', '20'),
(2, 'Python', '20'),
(3, 'Tailwindcss', '30'),
(4, 'Css/Sass', '60'),
(5, 'HTML', '81'),
(6, 'Javascript', '50'),
(7, 'Php', '65');
        ");

        $userSql = sprintf("
        INSERT INTO `user` (`id`, `email`, `roles`, `password`, `last_name`, `first_name`, `job`, `localisation`, `phone_number`, `language`, `about_me`, `hobies`) VALUES
(1, 'lutmickael@gmail.com', '[\"ROLE_ADMIN\"]', '%s', 'mickael', 'lutin', 'Web Developper', 'Paris, France', '0645943856', 'French 🇫🇷 - English 🇺🇸 (Basic)', 'I am a French web developer with 6 years of experience. <br> I have a deep expertise in programming with PHP. Recently, i have been expanding my skill set to include Python and SwiftUII (i am still learning).<br> I have worked in several companies as a web developer, where I have been involved in creating websites and applications from design to implementation and maintenance.<br> I have a solid understanding of object-oriented programming principles and database design. I am also experienced in optimizing website performance.<br> I am highly motivated to stay up-to-date with the latest web technologies and trends, always striving to improve my skills as a developer.', 'Sport: Brazilian Jiu Jitsu (competition)');",
        '$2y$13$cfAaeR33vEbxxLRseyNRRO.aeyrO.gvm3gQXhYdYOO.y9TTEvCkru'
        );

        $this->addSql($userSql);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE skill_chart');
        $this->addSql('DROP TABLE professional_skill');
        $this->addSql('DROP TABLE user');
    }
}
