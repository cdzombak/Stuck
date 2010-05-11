--- SQL Files for PostgreSQL
--- Constaints and specific types

--
-- Table structure for table ci_sessions
--

CREATE TABLE  ci_sessions (
  session_id varchar(40) NOT NULL default '0' PRIMARY KEY,
  ip_address varchar(16) NOT NULL default '0',
  user_agent varchar(50) NOT NULL,
  last_activity int NOT NULL default '0' CHECK (last_activity>0) ,
  session_data text NOT NULL,
  user_data text NOT NULL
) ;

--
-- Table structure for table languages
--

CREATE TABLE languages (
  code varchar(12) NOT NULL PRIMARY KEY,
  description varchar(32) NOT NULL,
  extension varchar(12) NOT NULL,
  "isMain" int NOT NULL default '0'
) ;

--
-- Data for table languages
--

INSERT INTO languages (code, description, extension, "isMain") VALUES
('c', 'C', 'c', 1),
('css', 'CSS', 'css', 1),
('cpp', 'C++', 'cpp', 1),
('html4strict', 'HTML (4 Strict)', 'html', 0),
('java', 'Java', 'java', 0),
('perl', 'Perl', 'pl', 1),
('php', 'PHP', 'php', 1),
('python', 'Python', 'py', 1),
('ruby', 'Ruby', 'rb', 1),
('text', 'Plain Text', 'txt', 1),
('asm', 'ASM (Nasm Syntax)', 'asm', 0),
('xhtml', 'XHTML', 'html', 1),
('actionscript', 'Actionscript', 'actionscript', 0),
('apache', 'Apache Log', 'log', 0),
('applescript', 'AppleScript', 'applescript', 0),
('bash', 'Bash', 'sh', 1),
('c_mac', 'C for Macs', 'c', 0),
('csharp', 'C#', 'cs', 0),
('delphi', 'Delphi', 'pas', 0),
('fortran', 'Fortran', 'for', 0),
('inno', 'Inno Setup', 'iss', 0),
('java5', 'Java 5', 'java', 0),
('javascript', 'Javascript', 'js', 0),
('latex', 'LaTeX', 'latex', 0),
('mirc', 'mIRC Script', 'mrc', 0),
('mysql', 'MySQL', 'sql', 1),
('nsis', 'NSIS', 'nsi', 0),
('objc', 'Objective C', 'm', 0),
('orcale8', 'Orcale 8 SQL', 'sql', 0),
('pascal', 'Pascal', 'pas', 0),
('robots', 'robots.txt', 'txt', 0),
('sql', 'SQL', 'sql', 1),
('winbatch', 'Windows Batch', 'bat', 0),
('xml', 'XML', 'xml', 0),
('verilog', 'Verilog', 'v', 0);

--
-- Table structure for table pastes
--

CREATE TABLE pastes (
  id SERIAL NOT NULL PRIMARY KEY,
  pid INTEGER NOT NULL,
  title varchar(128) NOT NULL,
  name varchar(64) NOT NULL,
  lang varchar(32) NOT NULL,
  private int NOT NULL,
  paste text NOT NULL,
  raw text NOT NULL,
  filename varchar(132) NOT NULL,
  created int NOT NULL,
  expire int NOT NULL default '0',
  toexpire int NOT NULL CHECK (toexpire> 0),
  snipurl varchar(64) NOT NULL default '0',
  replyto varchar(8) NOT NULL
) ;
