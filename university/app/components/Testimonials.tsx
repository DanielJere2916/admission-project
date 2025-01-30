"use client"

import { useState } from "react"
import Image from "next/image"

const testimonials = [
  {
    quote: "The supportive faculty helped me secure internships at top firms.",
    name: "John",
    program: "Law Graduate",
    image: "/john.jpg",
  },
  {
    quote: "I gained practical skills that made me stand out in the job market.",
    name: "Sarah",
    program: "Computer Science Graduate",
    image: "/sarah.jpg",
  },
  {
    quote: "The diverse student body enriched my learning experience.",
    name: "Michael",
    program: "Business Administration Graduate",
    image: "/michael.jpg",
  },
]

const Testimonials = () => {
  const [currentTestimonial, setCurrentTestimonial] = useState(0)

  const nextTestimonial = () => {
    setCurrentTestimonial((prev) => (prev + 1) % testimonials.length)
  }

  const prevTestimonial = () => {
    setCurrentTestimonial((prev) => (prev - 1 + testimonials.length) % testimonials.length)
  }

  return (
    <section className="py-16 bg-gray-100">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl font-bold text-center mb-8">What Our Students Say</h2>
        <div className="relative max-w-3xl mx-auto">
          <div className="bg-white rounded-lg shadow-lg p-8">
            <blockquote className="text-xl italic mb-4">"{testimonials[currentTestimonial].quote}"</blockquote>
            <div className="flex items-center">
              <Image
                src={testimonials[currentTestimonial].image || "/placeholder.svg"}
                alt={testimonials[currentTestimonial].name}
                width={64}
                height={64}
                className="rounded-full mr-4"
              />
              <div>
                <p className="font-semibold">{testimonials[currentTestimonial].name}</p>
                <p className="text-gray-600">{testimonials[currentTestimonial].program}</p>
              </div>
            </div>
          </div>
          <button
            onClick={prevTestimonial}
            className="absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-full bg-blue-600 text-white rounded-full p-2"
            aria-label="Previous testimonial"
          >
            &lt;
          </button>
          <button
            onClick={nextTestimonial}
            className="absolute top-1/2 right-0 transform -translate-y-1/2 translate-x-full bg-blue-600 text-white rounded-full p-2"
            aria-label="Next testimonial"
          >
            &gt;
          </button>
        </div>
      </div>
    </section>
  )
}

export default Testimonials

