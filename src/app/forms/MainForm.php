<?php
namespace app\forms;

use std, gui, framework, app;


class MainForm extends AbstractForm
{

    /**
     * @event slider.mouseDrag 
     */
    function doSliderMouseDrag(UXMouseEvent $e = null)
    {    
        $value = $this->slider->value;
        $this->player->rate = $value;
        $hz = intval($value * 60);
        $this->button5->text = "$hz Hz";
        
        if ($this->slider->value > 0)
        {
            $this->imageAlt->show();
            $this->imageAlt->mosaicGap = 80 - ($value * 10);
            $this->player->play();
            $this->doToggleButtonAction();
        }
        else 
        {
            $this->imageAlt->hide();
        }
    }

    /**
     * @event sliderAlt.mouseDrag 
     */
    function doSliderAltMouseDrag(UXMouseEvent $e = null)
    {    
        $value = $this->sliderAlt->value;
        $this->playerAlt->rate = $value;
        $hz = intval($value * 480);
        $this->button4->text = "$hz Hz";
        
        if ($this->sliderAlt->value > 0)
        {
            $this->image3->show();
            $this->image3->mosaicGap = 80 - ($value * 10);
            $this->playerAlt->play();
            $this->doToggleButtonAltAction();
        }
        else 
        {
            $this->image3->hide();
        }
    }

    /**
     * @event slider3.mouseDrag 
     */
    function doSlider3MouseDrag(UXMouseEvent $e = null)
    {    
        $value = $this->slider3->value;
        $this->player3->rate = $value;
        $hz = intval($value * 3840);
        $this->button6->text = "$hz Hz";
        
        if ($this->slider3->value > 0)
        {
            $this->image4->show();
            $this->image4->mosaicGap = 80 - ($value * 10);
            $this->player3->play();
            $this->doToggleButton3Action();
        }
        else 
        {
            $this->image4->hide();
        }
    }


    /**
     * @event toggleButton.action 
     */
    function doToggleButtonAction(UXEvent $e = null)
    {    
        $this->player->open('basefreq.mp3');
        
        if ($this->toggleButton->selected == true)
        {
            $this->player->play();
            $this->slider->value = $this->player->rate;
            $this->imageAlt->show();
        }
        else 
        {
            $this->player->pause();
            $this->slider->value = 0;
            $this->imageAlt->hide();
        }
    }

    /**
     * @event toggleButtonAlt.action 
     */
    function doToggleButtonAltAction(UXEvent $e = null)
    {    
        $this->playerAlt->open('basefreq480.mp3');
        
        if ($this->toggleButtonAlt->selected == true)
        {
            $this->playerAlt->play();
            $this->sliderAlt->value = $this->playerAlt->rate;
            $this->image3->show();
        }
        else 
        {
            $this->playerAlt->pause();
            $this->sliderAlt->value = 0;
            $this->image3->hide();
        }
    }

    /**
     * @event toggleButton3.action 
     */
    function doToggleButton3Action(UXEvent $e = null)
    {    
        $this->player3->open('basefreq3840.mp3');
        
        if ($this->toggleButton3->selected == true)
        {
            $this->player3->play();
            $this->slider3->value = $this->player3->rate;
            $this->image4->show();
        }
        else 
        {
            $this->player3->pause();
            $this->slider3->value = 0;
            $this->image4->hide();
        }
    }


    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
        app()->showForm('about');
    }

}
