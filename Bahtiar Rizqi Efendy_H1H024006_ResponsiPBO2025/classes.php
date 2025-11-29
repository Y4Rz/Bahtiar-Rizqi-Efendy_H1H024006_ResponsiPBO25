<?php
abstract class Pokemon {
    protected $name;
    protected $type;
    protected $level;
    protected $hp;
    protected $maxHp; 

    public function __construct($name, $type, $level, $hp) {
        $this->name = $name;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
        $this->maxHp = $hp;
    }

    public function getName() { return $this->name; }
    public function getType() { return $this->type; }
    public function getLevel() { return $this->level; }
    public function getHp() { return $this->hp; }

    abstract public function specialMove();
    abstract public function train($type, $intensity);
}

class Kadabra extends Pokemon {
    
    public function __construct() {

        parent::__construct("Kadabra", "Psychic", 16, 100);
    }

    public function specialMove() {
        return "Kadabra memegang sendoknya dan menembakkan gelombang aneh! (Psybeam)";
    }

    public function train($type, $intensity) {
        $xpGain = 0;
        $hpGain = 0;
        

        if ($type == "Meditation") {
            $xpGain = $intensity * 2;
            $hpGain = $intensity * 1.5;
        } else {
 
            $xpGain = $intensity * 1;
            $hpGain = $intensity * 0.5;
        }

        $oldLevel = $this->level;
        $oldHp = $this->hp;

        $this->level += floor($xpGain / 10);
        $this->hp += $hpGain;

        return [
            'type' => $type,
            'intensity' => $intensity,
            'old_level' => $oldLevel,
            'new_level' => $this->level,
            'old_hp' => $oldHp,
            'new_hp' => $this->hp,
            'desc' => $this->specialMove()
        ];
    }
}
?>