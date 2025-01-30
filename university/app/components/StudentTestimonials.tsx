"use client"

import { useState } from "react"
import { motion, AnimatePresence } from "framer-motion"
import Image from "next/image"

const testimonials = [
  {
    name: "Sarah Johnson",
    program: "Computer Science",
    year: "3rd Year",
    quote: "The vibrant campus life and supportive community have made my university experience unforgettable.",
    image: "/sarah-johnson.jpg",
  },
  {
    name: "Michael Lee",
    program: "Business Administration",
    year: "4th Year",
    quote: "I've grown both personally and professionally through the diverse opportunities available on campus.",
    image: "/michael-lee.jpg",
  },
  {
    name: "Emily Rodriguez",
    program: "Environmental Science",
    year: "2nd Year",
    quote: "The student clubs and volunteer programs have allowed me to pursue my passions and make a difference.",
    image: "/emily-rodriguez.jpg",
  },
]

const StudentTestimonials = () => {
  const [currentIndex, setCurrentIndex] = useState(0)

  const nextTestimonial = () => {
    setCurrentIndex((prevIndex) => (prevIndex + 1) % testimonials.length)
  }

  const prevTestimonial = () => {
    setCurrentIndex((prevIndex) => (prevIndex - 1 + testimonials.length) % testimonials.length)
  }

  return (
    <section className="py-12">
      <h2 className="text-3xl font-bold text-center mb-8">What Our Students Say</h2>
      <div className="relative max-w-4xl mx-auto">
        <AnimatePresence mode="wait">
          <motion.div
            key={currentIndex}
            initial={{ opacity: 0, x: 50 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: -50 }}
            transition={{ duration: 0.5 }}
            className="bg-white rounded-lg shadow-lg p-8 flex flex-col md:flex-row items-center"
          >
            <Image
              src={testimonials[currentIndex].image || "/placeholder.svg"}
              alt={testimonials[currentIndex].name}
              width={150}
              height={150}
              className="rounded-full mb-4 md:mb-0 md:mr-8"
            />
            <div>
              <p className="text-lg italic mb-4">"{testimonials[currentIndex].quote}"</p>
              <p className="font-semibold">{testimonials[currentIndex].name}</p>
              <p className="text-gray-600">
                {testimonials[currentIndex].program}, {testimonials[currentIndex].year}
              </p>
            </div>
          </motion.div>
        </AnimatePresence>
        <button
          onClick={prevTestimonial}
          className="absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-12 bg-white rounded-full p-2 shadow-lg"
        >
          &#8592;
        </button>
        <button
          onClick={nextTestimonial}
          className="absolute top-1/2 right-0 transform -translate-y-1/2 translate-x-12 bg-white rounded-full p-2 shadow-lg"
        >
          &#8594;
        </button>
      </div>
    </section>
  )
}

export default StudentTestimonials

